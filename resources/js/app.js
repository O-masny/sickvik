
import Alpine from "alpinejs";
import persist from '@alpinejs/persist';
import "./animation"
import "./scroll"
import "./slider"

Alpine.plugin(persist);

Alpine.store('darkMode', {
    on: Alpine.$persist(true).as('darkMode_on'),
    toggle() {
        this.on = !this.on;
    },
});

