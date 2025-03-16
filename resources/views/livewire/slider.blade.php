<div class="overflow-hidden relative w-full h-[400px] bg-white">
    <div id="slider" class="flex w-[400px] h-full">
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1 relative overflow-hidden">
                <img src="{{ $image }}" alt="Slide" 
                     class="w-full h-full object-cover rounded-lg transition-transform duration-500 will-change-transform"
                     loading="lazy">
            </div>
        @endforeach
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1 relative overflow-hidden">
                <img src="{{ $image }}" alt="Slide" 
                     class="w-full h-full object-cover rounded-lg transition-transform duration-500 will-change-transform"
                     loading="lazy">
            </div>
        @endforeach
    </div>
</div>

<script>
    let slider;
    let gsapAnimation;

    function initSlider() {
        slider = document.getElementById("slider");
        if (!slider) return;

        let sw = slider.children[0].offsetWidth;
        let tw = (slider.children.length / 2) * sw;
        let d = Math.max(10, tw / 150);

        gsap.killTweensOf(slider);
        gsapAnimation = gsap.to(slider, { x: `-${tw}px`, duration: d, ease: "linear", repeat: -1 });
    }

    document.addEventListener("DOMContentLoaded", initSlider);
    document.addEventListener("livewire:load", initSlider);
    document.addEventListener("livewire:updated", initSlider);

    // Dynamický zoom a posun podle myši
    document.querySelectorAll("#slider img").forEach(img => {
        img.addEventListener("mousemove", (e) => {
            let rect = img.getBoundingClientRect();
            let offsetX = (e.clientX - rect.left) / rect.width - 0.5; // -0.5 to 0.5
            let offsetY = (e.clientY - rect.top) / rect.height - 0.5; 

            gsap.to(img, { 
                scale: 2, 
                x: offsetX * -200, // Posun do stran
                y: offsetY * -50, // Posun nahoru/dolů
                duration: 0.3, 
                ease: "power2.out"
            });

            gsapAnimation.pause(); // Pozastaví slider
        });

        img.addEventListener("mouseleave", () => {
            gsap.to(img, { 
                scale: 1, 
                x: 0, 
                y: 0, 
                duration: 0.3, 
                ease: "power2.out"
            });

            gsapAnimation.resume(); // Obnoví slider
        });
    });
</script>
