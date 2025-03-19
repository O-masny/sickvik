import gsap from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
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
