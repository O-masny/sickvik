<div 
    x-data="{ open: false, showLightbox: false, selectedImage: '' }" 
    class="relative"
    x-cloak
>
    <div class="flex flex-col md:flex-row gap-6 relative">

        {{-- 🔘 TOGGLE BTN --}}
        <button
            @click="open = !open"
            aria-label="Otevřít filtr"
            class="fixed top-1/2 left-0 z-30 transform -translate-y-1/2 bg-white shadow px-2 py-1 rounded-r md:hidden"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M6.707 14.707a1 1 0 010-1.414L10 10 6.707 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
            </svg>
        </button>

        {{-- 🧩 FILTER SIDEBAR --}}
        <div 
            class="absolute md:static top-0 left-0 w-3/4 md:w-1/4 h-screen md:h-auto bg-gray-100 p-4 rounded-r-lg shadow-md z-20 transform transition-transform duration-300 ease-in-out"
            :class="{ '-translate-x-full': !open, 'translate-x-0': open, 'md:translate-x-0': true }"
            @click.away="open = false"
        >
            <h2 class="text-lg font-semibold mb-4">Filtrování</h2>

            <label class="block mb-2 text-sm font-medium">Vyhledávání</label>
            <input type="text" wire:model.live.debounce.500ms="search"
                class="w-full border p-2 rounded mb-4"
                placeholder="Hledat podle názvu...">

            <label class="block mb-2 text-sm font-medium">Tagy</label>
            <select wire:model.live="tag" class="w-full border p-2 rounded mb-4">
                <option value="">Všechny</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>

            <label class="block mb-2 text-sm font-medium">Seřadit podle</label>
            <select wire:model.live="sortBy" class="w-full border p-2 rounded">
                <option value="created_at">Datum přidání</option>
                <option value="title">Název</option>
            </select>
        </div>

        {{-- 🖼️ GALLERY --}}
        <div class="w-full md:w-3/4 relative">

            {{-- 💡 LIGHTBOX --}}
            <div 
                x-show="showLightbox" 
                x-transition.opacity
                class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
                @keydown.escape.window="showLightbox = false"
                @click.away="showLightbox = false"
            >
                <img :src="selectedImage" class="max-w-[90%] max-h-[90%] rounded shadow-lg" />
                <button @click="showLightbox = false" class="absolute top-4 right-4 text-white text-2xl">✕</button>
            </div>

            <div wire:loading.class="opacity-20">
                <div class="grid gap-4 grid-cols-[repeat(auto-fit,minmax(200px,1fr))]">
                    @foreach ($artworks as $art)
                        <div class="relative group bg-white shadow-md rounded overflow-hidden">
                            <a href="javascript:void(0);" 
                               @click="showLightbox = true; selectedImage = '{{ asset('storage/' . $art->image) }}'">
                                <img src="{{ asset('storage/' . $art->image) }}"
                                     class="w-full h-60 object-cover transition-transform duration-300 group-hover:scale-105 hover:opacity-80" />
                            </a>
                            <div class="p-3">
                                <p class="text-center text-sm font-bold">{{ $art->title }}</p>

                                @if ($art->tags->isNotEmpty())
                                    <div class="flex flex-wrap gap-1 mt-2 justify-center">
                                        @foreach ($art->tags as $tag)
                                            <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full">
                                                {{ $tag->name }}
                                            </span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
