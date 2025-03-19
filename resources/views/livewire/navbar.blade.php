<nav class="fixed bottom-0 left-0 w-full bg-white shadow-md shadow-gray-300 z-[1000]">
    <div class="md:h-16 h-20 mx-auto md:px-4 container flex items-center justify-between">
        
        <div class=" items-center left-0 my-10  flex justify-center">
                <img src="{{ asset('assets/logo/logo.svg') }}"width="70"height="70" alt="Logo" >
            @livewire('language-switcher')
            </div>
         

      <!-- Navigační položky (uprostřed) -->
        <div class="hidden md:flex text-gray-500 flex-1 justify-center">
            <ul class="flex font-semibold space-x-6">
                <li class="text-indigo-500"><a href="#">Dashboard</a></li>
                <li class="hover:text-indigo-400"><a href="#">Search</a></li>
                <li class="hover:text-indigo-400"><a href="#">Explore</a></li>
                <li class="hover:text-indigo-400"><a href="#">About</a></li>
                <li class="hover:text-indigo-400"><a href="#">Contact</a></li>
            </ul>
        </div>
     <div class="absolute flex flex-row justify-evenly items-center right-0">
<div class="w-10"></div>
            <!-- Menu button pro mobilní zařízení -->
            <button class="md:hidden p-3 rounded-md bg-gray-100 hover:bg-gray-200 transition"
                    wire:click="toggleMenu">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>
    </div>

    <!-- Mobile Drawer Menu (zprava) -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-[1050]" wire:click="closeMenu" wire:ignore.self
        x-data="{ open: @entangle('menuOpen') }"
        x-show="open"
        x-transition.opacity>
        
        <div class="fixed right-0 top-0 w-64 h-full bg-white shadow-md transform transition-transform flex flex-col items-center justify-center"
            x-show="open"
            x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full">
            
            <!-- Logo (vycentrované nahoře) -->
           
            <div class="absolute top-6 w-full flex justify-center">
                       <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/logo/logo-circle.svg') }}" alt="Logo" class="fixed left-0 top-0 h-13">
                       </a>
                    </div>
            
            <!-- Close button -->
            <button class="absolute bottom-2 right-2 p-2" wire:click="closeMenu">
                <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <!-- Drawer Links (vycentrované na střed obrazovky) -->
            <ul class="mt-20 space-y-6 text-lg text-gray-800 text-center w-full">
                <li><a href="#" wire:click="closeMenu">Dashboard</a></li>
                <li><a href="#" wire:click="closeMenu">Search</a></li>
                <li><a href="#" wire:click="closeMenu">Explore</a></li>
                <li><a href="#" wire:click="closeMenu">About</a></li>
                <li><a href="#" wire:click="closeMenu">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
