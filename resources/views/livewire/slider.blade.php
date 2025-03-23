<div class="overflow-x-hidden relative w-full h-[400px] bg-white">
    <div id="slider" class="flex w-[400px] h-full">
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1 relative overflow-hidden">
                <img src="{{ $image }}" 
                     alt="Slide" 
                     class="w-full h-full object-cover rounded-lg transition-transform duration-500 will-change-transform cursor-pointer"
                     loading="lazy"
                     decoding="async"
                     wire:navigate.hover
                     data-url="{{ route('artworks.show', ['id' => $loop->index]) }}">
            </div>
        @endforeach
    </div>
</div>

@vite("resources/js/app.js")
