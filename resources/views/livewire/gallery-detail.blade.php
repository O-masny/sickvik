    <div class="flex flex-col md:flex-row gap-6">
        <!-- Filtrační panel -->
        <div class="w-full md:w-1/4 bg-gray-100 p-4 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-4">Filtrování</h2>

            <!-- Vyhledávání -->
            <label class="block mb-2 text-sm font-medium">Vyhledávání</label>
            <input type="text" wire:model.live.debounce.500ms="search" 
                   placeholder="Hledat podle názvu..."
                   class="w-full border p-2 rounded mb-4">

            <!-- Filtrování podle tagů -->
            <label class="block mb-2 text-sm font-medium">Tagy</label>
            <select wire:model.live="tag" class="w-full border p-2 rounded mb-4">
                <option value="">Všechny</option>
                @foreach ($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
                @endforeach
            </select>

            <!-- Řazení -->
            <label class="block mb-2 text-sm font-medium">Seřadit podle</label>
            <select wire:model.live="sortBy" class="w-full border p-2 rounded">
                <option value="created_at">Datum přidání</option>
                <option value="title">Název</option>
            </select>
        </div>

        <!-- Galerie -->
        <div class="w-full md:w-3/4">
          

            <!-- Obrázky se zobrazí jen pokud nejsou ve stavu načítání -->
            <div wire:loading.remove>
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($artworks as $art)
                        <div class="relative group">
                           <a href="{{ url('/artworks/' . $art->id) }}">
                        <img src="{{ asset('storage/gallery/' . $art->file_name) }}" 
                            class="w-full h-auto rounded shadow-lg transition-transform transform group-hover:scale-110 hover:opacity-75">
                    </a>
                            <p class="mt-2 text-center text-sm font-bold">{{ $art->title }}</p>

                            <!-- Tagy jako chipy -->
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>

