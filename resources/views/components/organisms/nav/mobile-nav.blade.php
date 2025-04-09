<div class="fixed inset-0 bg-black bg-opacity-50 z-[1050]" wire:click="closeMenuMobile" wire:ignore.self
    x-show="openMobile" x-transition.opacity>
    <div class="fixed right-0 top-0 w-64 h-full bg-white shadow-md transition-transform" x-show="openMobile"
        x-transition:enter="transform transition ease-in-out duration-300" x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0" x-transition:leave="transform transition ease-in-out duration-300"
        x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full">
        <button @click="openMobile = false" class="absolute bottom-2 right-2 p-2">
            <x-atoms.nav.icon-close />
        </button>

        <ul class="mt-20 space-y-6 text-lg text-gray-800 text-center w-full">
            <li><a href="#" @click="openMobile = false">Dashboard</a></li>
            <li><a href="#" @click="openMobile = false">Search</a></li>
            <li><a href="#" @click="openMobile = false">Explore</a></li>
            <li><a href="#" @click="openMobile = false">About</a></li>
            <li><a href="#" @click="openMobile = false">Contact</a></li>
        </ul>
    </div>
</div>