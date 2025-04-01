@extends('components.layouts.app')

@section('content')
<div>
    @include("components.home-section")

    @include("components.horizontal_content")


    <div class="relative w-full h-screen flex justify-center items-center bg-cover bg-center text-white" 
        style="background-image: url('/assets/ink_2.png');">
        
 
        <h1 class="relative z-10 text-7xl font-bold">{{ __('messages.gallery') }}</h1>
    </div>

    <div class="w-full ">
        @livewire('slider')
    </div>
          <div class="flex text-center items-center justify-center z-30">
            <a href="{{ route('artworks') }}" wire:navigate.hover  x-transition:leave="transition ease-in duration-300"
>
                <h1 class="font-mono bg-black rounded-full py-4 px-6 text-2xl text-white">Přejít do galerie</h1>
            </a>      
 </div>  
    <div class="h-15"></div>

        <div class="h-1/2">
        </div>
   
           @include("components.model_viewer")
        <div class="h-screen">
            <livewire:contact-card />
        </div>
</div>     
@endsection
@vite("resources/css/app.css")