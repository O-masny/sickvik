<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}x-data :class="$store.darkMode.on && 'dark'"">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/4.0.0/model-viewer.min.js"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<title>{{ config('app.name') }}</title>

    @filamentStyles
</head>
 @vite(['resources/css/app.css', 'resources/js/app.js'])

<body  x-cloak class="relative overflow-x-hidden bg-white" x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="antialiased">    
      <!-- Sociální ikony napravo na velkých zařízeních -->
        <div class="hidden md:flex md:justify-end">
            @include("components.socials")
        </div>
    @livewire('navbar') 
<main>
<div
    x-data="{
        transitioning: false,
        init() {
            this.$watch('transitioning', val => {
                document.body.classList.toggle('overflow-hidden', val);
            });

            // 🟢 Slide-in from bottom
            this.$el.classList.add('translate-y-full', 'opacity-0');
            requestAnimationFrame(() => {
                this.$el.classList.add('transition-all', 'duration-700', 'ease-out');
                this.$el.classList.remove('translate-y-full', 'opacity-0');
                this.$el.classList.add('translate-y-0', 'opacity-100');
            });

            // 🔴 Slide-out to top on link click
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
    <main x-data x-init="$nextTick(() => $el.classList.remove('opacity-0'))" class="opacity-0 transition-opacity duration-500">
        @yield('content')
    </main>
</div>

</main>

</body>

@stack('scripts')
    @livewireScripts
    @filamentScripts
</html>
