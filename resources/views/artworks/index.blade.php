@extends('components.layouts.app')

@section('content')
    {{-- BACKGROUND --}}
    <div class="absolute inset-0 z-0 bg-no-repeat bg-cover bg-center opacity-20"
        style="background-image: url('/assets/background/ink_bg.webp'); pointer-events: none;"></div>

    <div class="relative z-10 container mx-auto p-4">
        <div class="h-screen flex items-center justify-center">
            <h1 class="text-5xl font-bold text-center">{{ __('messages.gallery') }}</h1>
        </div>

        {{-- BUTTON → komunikuje s Livewire --}}
        <button wire:click="$emit('toggleFilter')"
            class="fixed bottom-4 left-4 z-50 bg-black text-white p-3 rounded-full shadow-lg hover:bg-gray-800 transition-all duration-200"
            title="Zobrazit filtr">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2a1 1 0 01-.293.707L15 13.414V19a1 1 0 01-1.447.894l-4-2A1 1 0 019 17v-3.586L3.293 6.707A1 1 0 013 6V4z" />
            </svg>
        </button>

        {{-- Obsah galerie --}}
        <div>
            @livewire('gallery-detail', ['images' => $artworks])
        </div>
    </div>
@endsection