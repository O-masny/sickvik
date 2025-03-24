import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";
import { trackProgress } from 'https://esm.sh/@bramus/sda-utilities@1';

document.addEventListener("scroll", () => {
    let model = document.getElementById("girl-model");
    if (!model) return;
    // Scroll progress (0 až 1)
    let scrollProgress = window.scrollY / (document.body.scrollHeight - window.innerHeight);

    // Otočení X podle scrollu (od 0° do 360°)
    let rotation = scrollProgress * 360;

    // Aplikujeme otočení
    model.setAttribute("rotation", `${rotation}deg 0deg 0deg`);
});

document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);
    function gsapFunction() {
        const tl = gsap.timeline({});
        const cardsContainer = document.querySelector(".cards--container");
        const cards = document.querySelectorAll(".card");
        const sectionPin = document.querySelector("#sectionPin");
        const pinWrap = document.querySelector(".pin-wrap");

        const model = document.getElementById('model-circle');


        if (!sectionPin || !pinWrap) return;

        /* Nastavíme výšku hlavní sekce pro dostatek prostoru k scrollování */
        sectionPin.style.height = "500vh";
        sectionPin.style.overflow = "visible";

        /* Sticky element, který zůstane v viewportu během horizontálního posunu */
        const pinWrapSticky = document.querySelector(".pin-wrap-sticky");
        pinWrapSticky.style.height = "100vh";
        pinWrapSticky.style.width = "98vw";
        pinWrapSticky.style.position = "sticky";
        pinWrapSticky.style.top = "0";
        pinWrapSticky.style.overflowX = "hidden";
        gsap.to(model, {
            rotationY: 360, // Otočení o 360°
            ease: "none",
            scrollTrigger: {
                trigger: "#sectionPin",
                start: "top top",
                end: "top -100%",
                scrub: 1,
            },
            onUpdate: function () {
                let progress = this.progress(); // 0 - 1

                // Nastavení rotace modelu
                model.setAttribute("rotation", `0deg ${progress * 360}deg 0deg`);

                // Jemné přiblížení (mezi 3m → 2.5m)
                let newDistance = 3 - progress * 0.5;
                model.setAttribute("camera-orbit", `0deg 90deg ${newDistance}m`);
            },
        });
        /* Šířka obsahu pro horizontální posun */
        pinWrap.style.height = "100vh";
        pinWrap.animate(
            {
                transform: [`translateX(0)`, `translateX(calc(-100% + 100vw))`],
            },
            {
                timeline: new ViewTimeline({
                    subject: sectionPin,
                    axis: "block",
                }),
                fill: "forwards",
                rangeStart: "contain 0%",
                rangeEnd: "contain 60%",
            }
        );
        model.animate(
            {
                transform: [`translateX(0)`, `translateX(calc(-100% + 100vw))`],
            },
            {
                timeline: new ViewTimeline({
                    subject: sectionPin,
                    axis: "block",
                }),
                fill: "forwards",
                rangeStart: "contain 0%",
                rangeEnd: "contain 60%",
            }
        );

        cards.forEach((el, index) => {
            let scale = Number(0.9 + 0.025 * index).toFixed(2);
            let rotation = 10;

            gsap.to(el, {
                scale,
                rotationX: rotation,
                transformOrigin: "top center",
                scrollTrigger: {
                    trigger: el,
                    start: "top " + (60 + 70 * index),
                    end: "bottom+=140px 62%",
                    endTrigger: cardsContainer,
                    scrub: true,
                    pin: el,
                    pinSpacing: false,
                    id: index,

                    onEnter: () => {
                        el.style.backgroundColor = "white";
                        el.style.border = "1px solid black";
                    },
                    onLeaveBack: () => {
                        el.style.backgroundColor = "var(--yellow-saffron)";
                        el.style.border = "1px solid transparent";
                    }
                }
            });
        });

    }

    if (gsap) {
        gsapFunction();
    }



    gsap.set("#homepage-content", { opacity: 0 });
    gsap.set(".hero-subtitle", { opacity: 0, y: 50 });
    // 🔹 Nastavení výchozích hodnot pro skrytí
    gsap.set(".fade-in", { opacity: 0, y: 50 });


    gsap.to("#splash", {
        delay: 2, // Zobrazit po dobu 2s
        opacity: 0,
        duration: 1, // Fade-out trvá 1s
        ease: "power2.out",
        onComplete: () => {
            document.getElementById("splash").style.display = "none"; // Skryje splash
        }
    });

    // 🟢 Postupné zobrazení obsahu
    gsap.to("#homepage-content", {
        opacity: 1,
        duration: 5,
        ease: "none",
        delay: 2.5 // Čeká na splash animaci
    });



    // 🔥 Slide-up efekt pro jednotlivé obrázky galerie
    gsap.utils.toArray(".gallery-item").forEach((item, i) => {
        gsap.from(item, {
            opacity: 0,
            y: 50,
            duration: 1.5,
            delay: i * 0.2, // Každý obrázek začne animaci s menším zpožděním
            scrollTrigger: {
                trigger: item,
                start: "top 95%",
                end: "top 60%",
                scrub: true,
            }
        });
    });

    // 🔥 Animace pro pozadí inkoustu (fade-in)
    gsap.to(".background-ink", {
        opacity: 1,
        duration: 1.5,
        ease: "power2.out",
        scrollTrigger: {
            trigger: ".background-ink",
            start: "top 80%",
            end: "top 50%",
            scrub: true,
        }
    });

});
