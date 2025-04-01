<div
    class="relative w-full h-[400px] overflow-x-hidden bg-white"
    x-data
    x-init="$nextTick(() => window.dispatchEvent(new Event('sliderReady')))"
>
    <div id="slider" class="flex h-full">
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1 relative overflow-hidden rounded-lg bg-gray-200 animate-pulse shimmer-image">
                <img
                    data-src="{{ $image }}"
                    alt="Obrázek"
                    class="lazy-image absolute inset-0 w-full h-full object-cover opacity-0 transition-opacity duration-700 rounded-lg"
                    loading="lazy"
                    decoding="async"
                />
            </div>
        @endforeach
    </div>
</div>