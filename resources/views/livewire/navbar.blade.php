<div x-data="{ openMobile: false, openDesktop: false }">

    {{-- 🔵 Desktop FAB + Menu --}}
    <div
        class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-[9999] w-full max-w-screen-lg px-4 hidden md:block">

        {{-- FAB Button --}}
        <template x-if="!openDesktop">
            <button @click="openDesktop = true"
                class="flex items-center justify-center w-16 h-16 mx-auto rounded-full bg-white shadow-xl border border-gray-300 transition-transform hover:scale-105">
                <lottie-player src="{{ asset('assets/lottie/arrow.json') }}" background="transparent" speed="1"
                    style="width: 50px; height: 50px;" loop autoplay>
                </lottie-player>
            </button>
        </template>

        {{-- Expanded Menu --}}
        <template x-if="openDesktop">
            <div x-transition
                class="flex items-center justify-between px-6 py-3 mx-auto rounded-2xl backdrop-blur-md bg-white/60 border border-white/30 shadow-xl w-full max-w-screen-lg">

                {{-- Left --}}
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('assets/logo/logo.svg') }}" alt="Logo" class="h-10">
                    @livewire('language-switcher')
                </div>

                {{-- Center --}}
                <ul class="flex space-x-6 text-lg font-semibold text-gray-800">
                    <li><a href="{{ route('home') }}" class="hover:text-indigo-600">Domů</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-indigo-600">O mně</a></li>
                    <li><a href="{{ route('artworks') }}" class="hover:text-indigo-600">Galerie</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-indigo-600">Kontakt</a></li>
                    <li><a href="{{ route('care') }}" class="hover:text-indigo-600">Know-how</a></li>
                </ul>

                {{-- Right --}}
                <div class="flex items-center space-x-4">
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

    <div class="fixed bottom-4 right-4 md:hidden z-[100]">
        <button class="p-3 rounded-md bg-white shadow-md hover:bg-gray-100 transition"
            @click="openMobile = !openMobile">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>
        </button>
    </div>

    <div x-show="openMobile" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50 z-[1050]"
        @click.self="openMobile = false">
        <div class="fixed right-0 top-0 w-64 h-full bg-white shadow-md flex flex-col items-center justify-center"
            x-transition:enter="transform transition ease-in-out duration-300"
            x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition ease-in-out duration-300" x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full">

            <div class=" top-0 w-full flex justify-center">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/logo/logo-circle.svg') }}" alt="Logo" class="h-13">
                </a>
            </div>

            <button class="absolute bottom-2 right-2 p-2" @click="openMobile = false">
                <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

            <ul class="mt-20 space-y-6 text-lg text-gray-800 text-center w-full">
                <div class="hover:bg-black hover:text-white ">
                    <li><a href="#" @click="openMobile = false" class="">Dashboard</a></li>
                </div>
                <div class="hover:bg-black hover:text-white ">
                    <li><a href="#" @click="openMobile = false">Search</a></li>
                </div>
                <div class="hover:bg-black hover:text-white ">
                    <li><a href="#" @click="openMobile = false">Explore</a></li>
                </div>
                <div class="hover:bg-black hover:text-white ">
                    <li><a href="#" @click="openMobile = false">About</a></li>
                </div>
                <div class="hover:bg-black hover:text-white ">
                    <li><a href="#" @click="openMobile = false">Contact</a></li>
                </div>
            </ul>
        </div>
    </div>
</div>