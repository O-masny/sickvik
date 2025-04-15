<div class="w-full md:w-3/4 relative">
    <x-molecules.filter.lightbox />
    <div wire:loading.class="opacity-20">
        <div class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(200px,1fr))]">
            @foreach ($artworks as $art)
                <x-molecules.filter.artwork-card :art="$art"
                    @openLightbox="showLightbox = true; selectedImage = '{{ asset('storage/' . $art->image) }}'" />
            @endforeach
        </div>
    </div>
</div>
