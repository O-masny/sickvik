@props([
    'tags' => [],
])

<div class="sticky  h-full w-[320px] z-50 bg-white shadow-2xl overflow-y-auto">
    <div class="absolute inset-0 bg-black/50" wire:click="toggleFilter"></div>
    <div class="relative bg-white w-[320px] h-full overflow-y-auto z-50 p-6 shadow-2xl">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold">Filtrování</h2>
            <button wire:click="toggleFilter" class="text-gray-500 hover:text-black">✕</button>
        </div>

        <label class="block mb-2 text-sm font-medium">Vyhledávání</label>
        <input type="text" wire:model.live.debounce.500ms="search" placeholder="Hledat podle názvu..."
            class="w-full border p-2 rounded mb-4">

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
</div>