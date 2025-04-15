<div class="relative group bg-white shadow-md rounded overflow-hidden">
    <a href="javascript:void(0);" @click="$dispatch('openLightbox')">
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