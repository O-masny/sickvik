<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="application-name" content="{{ config('app.name') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        @filamentStyles
        @vite('resources/css/app.css') <!-- Make sure Vite is properly configured -->
    </head>
    <body class="antialiased bg-gray-50">
        @livewire('navbar')  <!-- Navbar Livewire Component -->
        
        <main>
            {{ $slot }} <!-- This will contain the content passed from child views -->
        </main>

        @livewire('footer')  <!-- Footer Livewire Component -->
        @livewire('example-component')  <!-- Footer Livewire Component -->

        @livewire('notifications')

        @filamentScripts
        @vite('resources/js/app.js')
    </body>
</html>
