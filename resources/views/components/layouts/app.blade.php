<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <title>{{ config('app.name') }}</title>

    @filamentStyles
    @vite('resources/css/app.css')

</head>
<body >
    <!-- Hlavní obsah stránky (Slot) -->

    @livewire('navbar')  <!-- Navbar Livewire komponenta -->
    <main>
        @yield('content') <!-- Toto je místo pro slot -->
    </main>


    @filamentScripts
    @stack('scripts')
    @vite('resources/js/app.js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollToPlugin.min.js"></script>
</body>
</html>
