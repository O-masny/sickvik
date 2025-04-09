<div class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-[9999] w-full max-w-screen-lg px-4">

    {{-- FAB --}}
    <template x-if="!openDesktop">
        <button @click="openDesktop = true"
            class="hidden md:flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-white shadow-xl border border-gray-300 transition-transform hover:scale-105">
            <lottie-player src="{{ asset('assets/lottie/arrow.json') }}" background="transparent" speed="1"
                style="width: 50px; height: 50px;" loop autoplay>
            </lottie-player>
        </button>
    </template>

    {{-- Expanded navbar --}}
    <template x-if="openDesktop">
        <div x-transition:enter="transition-all ease-out duration-500" x-transition:enter-start="opacity-0 scale-90"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all ease-in duration-300"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
            class="hidden md:flex items-center justify-between px-6 py-3 mx-auto rounded-2xl backdrop-blur-md bg-white/60 border border-white/30 shadow-xl w-full max-w-screen-lg">

            {{-- levá sekce --}}
            <div class="flex items-center space-x-4">
                <img src="{{ asset('assets/logo/logo.svg') }}" alt="Logo" class="h-10">
                @livewire('language-switcher')
            </div>

            {{-- navigace --}}
            <ul class="flex space-x-6 text-lg font-semibold text-gray-800">
                <li><a href="{{ route('home') }}" class="hover:text-indigo-600">Domů</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-indigo-600">O mně</a></li>
                <li><a href="{{ route('artworks') }}" class="hover:text-indigo-600">Galerie</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-indigo-600">Kontakt</a></li>
                <li><a href="{{ route('care') }}" class="hover:text-indigo-600">Know-how</a></li>
            </ul>

            {{-- pravá sekce --}}
            <div class="flex items-center space-x-4">
                @include("components.socials")
                <button @click="openDesktop = false" class="p-2 rounded-full hover:bg-white/40 transition">
                    <svg class="w-6 h-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </template>

</div>