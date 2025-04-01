@extends('components.layouts.app')
@section('content')

<div class="container mx-auto p-4">
    <!-- Hlavní nadpis přes celou výšku obrazovky -->
    <div class="h-screen flex items-center justify-center">
        <h1 class="text-5xl font-bold text-center">{{ __('messages.gallery')}}</h1>
    </div>

<div>
   @livewire('gallery-detail', ['images' => $artworks])
</div>
</div>
@endsection('content')









