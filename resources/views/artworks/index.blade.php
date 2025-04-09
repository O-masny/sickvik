@extends('components.layouts.app')

@section('content')
    {{-- FIRST BACKGROUND (např. textura) --}}
    <div class="absolute inset-0 z-0 bg-no-repeat bg-cover bg-center opacity-20"
        style="background-image: url('/assets/background/ink_bg.webp'); pointer-events: none;"></div>

    <div class="relative z-10 container mx-auto p-4">
        <div class="h-screen flex items-center justify-center">
            <h1 class="text-5xl font-bold text-center">{{ __('messages.gallery') }}</h1>
        </div>

        <div>
            @livewire('gallery-detail', ['images' => $artworks])
        </div>
    </div>
@endsection