<div class="overflow-x-hidden relative w-full h-[400px] bg-white">
    <div id="slider" class="flex w-[400px] h-full">
        @foreach($images as $image)
            <div class="min-w-[250px] h-[350px] mx-1 relative overflow-hidden">
                <img 
                    src="{{ asset('storage/gallery/blurred-' . $image) }}" 
                    alt="Slide" 
                    class="w-full h-full object-cover rounded-lg transition-transform duration-500 will-change-transform cursor-pointer blur-up"
                    data-src="{{ asset('storage/gallery/' . $image) }}" 
                    loading="lazy" 
                    decoding="async"
                    data-url="{{ route('artworks.show', ['id' => $loop->index]) }}"
                >
            </div>
        @endforeach
    </div>
</div>

<script>
    const images = document.querySelectorAll('.blur-up');
    images.forEach(image => {
        image.onload = () => {
            image.classList.remove('blur-up');
            image.src = image.dataset.src;
        };
    });
</script>