<!DOCTYPE html>
<html 
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data="{ darkMode: $persist(false) }" 
    :class="{ 'dark': darkMode }"
>
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @filamentStyles

    {{-- externí knihovny --}}
    <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
</head>

<body 
    x-cloak
    class="relative overflow-x-hidden bg-white antialiased"
>     
    <div class="hidden md:flex md:justify-end">
        @include("components.socials")
    </div>


    <main>
    @livewire('navbar') 
        <div
            x-data="{
                transitioning: false,
                init() {
                    this.$watch('transitioning', val => {
                        document.body.classList.toggle('overflow-hidden', val);
                    });

                    // Slide-in
                    this.$el.classList.add('translate-y-full', 'opacity-0');
                    requestAnimationFrame(() => {
                        this.$el.classList.add('transition-all', 'duration-700', 'ease-out');
                        this.$el.classList.remove('translate-y-full', 'opacity-0');
                        this.$el.classList.add('translate-y-0', 'opacity-100');
                    });

                    // Slide-out
                    document.querySelectorAll('a[href]').forEach(link => {
                        link.addEventListener('click', (e) => {
                            const isInternal = link.hostname === window.location.hostname &&
                                !link.hasAttribute('target') &&
                                !link.getAttribute('href').startsWith('#');

                            if (isInternal) {
                                e.preventDefault();
                                this.transitioning = true;
                                this.$el.classList.remove('translate-y-0', 'opacity-100');
                                this.$el.classList.add('-translate-y-full', 'opacity-0');
                                setTimeout(() => {
                                    window.location.href = link.href;
                                }, 500);
                            }
                        });
                    });
                }
            }"
            x-cloak
            class="page-transition relative opacity-0 translate-y-full"
        >
            @yield('content')
        </div>
    </main>

    @livewireScripts
    @stack('scripts')
    @filamentScripts
</body>
</html>
