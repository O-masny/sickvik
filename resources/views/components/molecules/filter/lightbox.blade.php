<div x-show="showLightbox" x-transition.opacity
    class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
    @keydown.escape.window="$dispatch('close')" @click.away="$dispatch('close')">
    <img :src="selectedImage" class="max-w-[90%] max-h-[90%] rounded shadow-lg" />
    <button @click="$dispatch('close')" class="absolute top-4 right-4 text-white text-2xl">✕</button>
</div>