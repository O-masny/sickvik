<div>
    <div class="relative">




        @if($filterOpen)
            <x-atoms.filter.filter-button :tags="$tags" />
        @endif

        {{-- 💥 OBSAH GALERIE --}}
        <section class="relative h-[200vh] bg-white">
            <div class="sticky top-0 h-screen flex flex-col items-center justify-center overflow-hidden">

                <div class="flex gap-8 justify-center px-8 w-full">
                    @foreach ($artworks->chunk(6)->take(6) as $index => $chunk)
                        <x-molecules.slider-track :images="$chunk" :reverse="$index % 2 === 1" />
                    @endforeach
                </div>
            </div>
        </section>

    </div>
    <button wire:click="toggleFilter"
        class="fixed bottom-4 left-4 z-50 bg-black text-white p-3 rounded-full shadow-lg hover:bg-gray-800 transition-all duration-200"
        title="Zobrazit filtr">
        {{-- Ikona trychtýře (filtr) --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
        </svg>
    </button>
</div>