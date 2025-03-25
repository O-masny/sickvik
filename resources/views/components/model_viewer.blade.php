<section id="sectionModelPin" class="relative h-[200vh]">

        <div class="sticky left-0 right-0 bottom-0 h-screen w-full z-10">
<div id="floating-text"
     class="absolute top-12 left-12 text-yellow-400 text-6xl font-extrabold glassmorphism pointer-events-none z-20 shadow-xl">
  Tvé<br>jméno/model
</div>
    <model-viewer 
        id="model-viewer"
        src="{{ asset('assets/3d/model_girl.glb') }}"
        ar
        disable-zoom
        camera-orbit="0deg 90deg 10m"
        camera-target="3m 3m 3m"
        field-of-view="30deg"
        auto-rotate
        class="w-full h-full">
    </model-viewer>
     
    </div>
</section>
<script>
const modelViewer = document.getElementById("model-viewer");

const maxRotationSpeed = 5;
const rotationMultiplier = 0.3;
const scrollStopDelay = 100;
let currentZoom = 8; // nebo 9, 10 – podle potřeby

let currentRotationSpeed = 0;
let previousScrollPosition = window.scrollY;
let isUserScrolling = false;
let scrollStopTimeout = null;
let currentRotationDeg = 0;

function stopAutoRotateTemporarily() {
    isUserScrolling = true;
    modelViewer.autoRotate = false;

    clearTimeout(scrollStopTimeout);
    scrollStopTimeout = setTimeout(() => {
        isUserScrolling = false;
        modelViewer.autoRotate = true;
    }, scrollStopDelay);
}

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    const scrollDiff = scrollY - previousScrollPosition;
    const scrollDirection = scrollDiff > 0 ? 1 : -1;

    stopAutoRotateTemporarily();

    currentRotationSpeed = Math.min(Math.abs(scrollDiff) * rotationMultiplier, maxRotationSpeed);
    currentRotationDeg += currentRotationSpeed * scrollDirection;
    currentZoom += scrollDiff * 0.02; // citlivost zoomu
    currentZoom = Math.min(Math.max(currentZoom, 6), 12);
    modelViewer.cameraOrbit = `${currentRotationDeg}deg 90deg  ${currentZoom}m`;

    previousScrollPosition = scrollY;
});
</script>
