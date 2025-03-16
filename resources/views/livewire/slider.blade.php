<div class="overflow-hidden relative w-full h-[400px] bg-white">
    <div id="slider" class="flex w-[400px] h-full">
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1">
                <img src="{{ $image }}" alt="Slide" class="w-full h-full object-cover rounded-lg">
            </div>
        @endforeach
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1">
                <img src="{{ $image }}" alt="Slide" class="w-full h-full object-cover bg-white rounded-lg">
            </div>
        @endforeach
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let s = document.getElementById("slider"),
            sw = s.children[0].offsetWidth,
            tw = s.children.length / 2 * sw,
            d = Math.max(10, tw / 150);

        gsap.to(s, { x: `-${tw}px`, duration: d, ease: "linear", repeat: -1 });
    });
</script>
