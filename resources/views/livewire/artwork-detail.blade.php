<div class="container mx-auto p-4">
    <!-- Detail Image & Info -->
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Image -->
        <div class="w-full md:w-2/3">
            <img src="{{ asset('storage/gallery/' . $artwork->file_name) }}" 
                 class="w-full h-auto rounded shadow-lg">
        </div>

        <!-- Info Section -->
        <div class="w-full md:w-1/3 sticky top-0 p-4 bg-white shadow-md rounded-lg">
            <h1 class="text-3xl font-bold">{{ $artwork->title }}</h1>
            <p class="text-gray-600 mt-2">{{ $artwork->description }}</p>
            <p class="text-sm text-gray-500 mt-2">Přidáno: {{ $artwork->created_at->format('d.m.Y') }}</p>

            <!-- Tagy -->
            @if ($artwork->tags->isNotEmpty())
                <div class="mt-4">
                    @foreach ($artwork->tags as $tag)
                        <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full mr-2">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Related Images Slider -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold mb-4">Další obrázky</h2>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($relatedArtworks as $related)
                    <div class="swiper-slide">
                        <a href="{{ url('/artworks/' . $related->id) }}">
                            <img src="{{ asset('storage/gallery/' . $related->file_name) }}" 
                                 class="w-full h-48 object-cover rounded shadow-lg">
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Navigace Swiperu -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>
