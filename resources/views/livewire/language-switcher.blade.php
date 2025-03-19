<div class="relative  z-50">
   <button wire:click="toggleLanguage"
            class="w-8 h-8 shadow-lg flex items-center justify-center transition relative overflow-hidden bg-gray-200">
        <div class="w-full h-full bg-center bg-cover"
             style="background-image: url('{{ asset($locale === 'cs' ? 'assets/flags/flag-cz.svg' : 'assets/flags/flag-gb.svg') }}');">
        </div>
    </button>
</div>