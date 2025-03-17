<div class="fixed top-4 right-4 z-50">
    <button wire:click="toggleLanguage"
            class="w-12 h-12 rounded-full shadow-lg flex items-center justify-center bg-white hover:bg-gray-100 transition">
        {{ $locale === 'cs' ? '🇨🇿' : '🇬🇧' }}
    </button>
</div>