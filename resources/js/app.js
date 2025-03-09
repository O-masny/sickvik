import gsap from "gsap";
import ScrollToPlugin from "gsap/ScrollToPlugin";

gsap.registerPlugin(ScrollToPlugin);

const content = document.getElementById("smooth-content");
gsap.set(document.body, { height: content.clientHeight });


