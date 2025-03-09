<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>{{ config('app.name') }}</title>

    @filamentStyles
    @vite('resources/css/app.css')

</head>
<body class="antialiased bg-gray-50" x-data="{ loading: false }"
     x-on:livewire:navigate-start="loading = true"
     x-on:livewire:navigate-stop="loading = false">

    <!-- Globální Loading Overlay -->
    <div x-show="loading" class="fixed inset-0 flex items-center justify-center bg-white bg-opacity-80 z-50">
        <div class="animate-spin rounded-full h-12 w-12 border-t-4 border-blue-500"></div>
    </div>

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
