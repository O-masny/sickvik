@props(['tags' => []])

{{-- 🔍 Vyhledávání --}}
<div class="mb-4">
    <label class="block mb-2 text-sm font-medium">Vyhledávání</label>
    <input type="text" wire:model.debounce.500ms="search" placeholder="Hledat podle názvu..."
        class="w-full border p-2 rounded" />
</div>

{{-- 🏷️ Tagy --}}
<div class="mb-4">
    <label class="block mb-2 text-sm font-medium">Tagy</label>
    <select wire:model="tag" class="w-full border p-2 rounded">
        <option value="">Všechny</option>
        @foreach ($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

{{-- 🔽 Seřazení --}}
<div class="mb-2">
    <label class="block mb-2 text-sm font-medium">Seřadit podle</label>
    <select wire:model="sortBy" class="w-full border p-2 rounded">
        <option value="created_at">Datum přidání</option>
        <option value="title">Název</option>
    </select>
</div>