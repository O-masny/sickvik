
import Alpine from "alpinejs";
import persist from '@alpinejs/persist';
import intersect from '@alpinejs/intersect'
import { initInkEffect } from './ink.js';
import "./animation"
import "./scroll"
import "./slider"

Alpine.plugin(persist, intersect);

Alpine.store('darkMode', {
    on: Alpine.$persist(true).as('darkMode_on'),
    toggle() {
        this.on = !this.on;
    },
});
window.initInkEffect = initInkEffect;

