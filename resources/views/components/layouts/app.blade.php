<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}x-data :class="$store.darkMode.on && 'dark'"">
<head>
    <meta charset="utf-8">
    <meta name="application-name" content="{{ config('app.name') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>

    @filamentStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
</head>
<body x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="antialiased">    

    @livewire('navbar') 
    <main >
        @yield('content') <!-- Toto je místo pro slot -->
    </main>

<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.7/dist/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/ScrollToPlugin.min.js"></script>
    @stack('scripts')
    @livewireScripts
    @filamentScripts
</body>
</html>
