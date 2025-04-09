import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";
import ScrollToPlugin from "gsap/ScrollToPlugin";


document.addEventListener("DOMContentLoaded", function () {
    gsap.registerPlugin(ScrollToPlugin, ScrollTrigger);

    gsap.to("#floating-text", {
        scrollTrigger: {
            trigger: "#sectionModelPin",
            start: "top 100%",
            end: "bottom",
            scrub: true,
        },
        rotateY: 560,
        transformOrigin: "center center",
        ease: "none"
    });

    function gsapFunction() {
        const tl = gsap.timeline({});
        const cardsContainer = document.querySelector(".cards--container");
        const cards = document.querySelectorAll(".card");
        const sectionPin = document.querySelector("#sectionPin");
        const pinWrap = document.querySelector(".pin-wrap");


        if (!sectionPin || !pinWrap) return;

        /* Nastavíme výšku hlavní sekce pro dostatek prostoru k scrollování */
        sectionPin.style.height = "500vh";
        sectionPin.style.overflow = "visible";

        /* Sticky element, který zůstane v viewportu během horizontálního posunu */
        const pinWrapSticky = document.querySelector(".pin-wrap-sticky");

        pinWrapSticky.style.position = "sticky";
        pinWrapSticky.style.overflowX = "hidden";


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
                rangeEnd: "contain 100%",
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
