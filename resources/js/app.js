import "./animation"
import "./scroll"
document.addEventListener('alpine:init', () => {

    Alpine.store('darkMode', {

        on: Alpine.$persist(true).as('darkMode_on'),

        toggle() {
            this.on = !this.on;
        },
    });
});
console.log("GSAP loaded:", typeof gsap !== "undefined");

