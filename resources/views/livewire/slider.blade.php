<div class="overflow-x-hidden relative w-full h-[400px] bg-white">
    <div id="slider" class="flex w-[400px] h-full">

        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1 relative overflow-hidden">
                <img src="{{ $image }}" 
                     alt="Slide" 
                     class="w-full h-full object-cover rounded-lg transition-transform duration-500 will-change-transform cursor-pointer"
                     loading="lazy"
                     wire:navigate.hover
                     data-url="{{ route('artworks.show', ['id' => $loop->index]) }}">
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
        let d = Math.max(15, tw / 100); // Zpomalení posunu

        gsap.killTweensOf(slider);
        gsapAnimation = gsap.to(slider, { 
            x: `-${tw}px`, 
            duration: d, 
            ease: "power1.inOut", 
            repeat: -1 
        });
    }

    document.addEventListener("DOMContentLoaded", initSlider);
    document.addEventListener("livewire:load", initSlider);
    document.addEventListener("livewire:updated", initSlider);

    // Dynamický zoom a zastavení slideru při hoveru
    document.querySelectorAll("#slider img").forEach(img => {
        img.addEventListener("mousemove", (e) => {
            let rect = img.getBoundingClientRect();
            let offsetX = (e.clientX - rect.left) / rect.width - 0.5;
            let offsetY = (e.clientY - rect.top) / rect.height - 0.5; 

            gsap.to(img, { 
                scale: 2, 
                x: offsetX * -200, 
                y: offsetY * -50, 
                duration: 0.3, 
                ease: "power2.out"
            });

            gsapAnimation.pause();
        });

        img.addEventListener("mouseleave", () => {
            gsap.to(img, { 
                scale: 1, 
                x: 0, 
                y: 0, 
                duration: 0.3, 
                ease: "power2.out"
            });

            gsapAnimation.resume();
        });

        // Kliknutí přesměruje na detail
        img.addEventListener("click", () => {
            let url = img.getAttribute("data-url");
            if (url) {
                window.location.href = url;
            }
        });
    });
</script>
