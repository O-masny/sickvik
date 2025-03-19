@extends('components.layouts.app')

@section('content')
<div>
    @livewire('splash')
    
    <div id="homepage-content" class="flex flex-col justify-center items-center h-screen  text-center">
        <h1 class=" text-black font-share-mono text-7xl z-20">SickVik</h1>
        <h2 class="fade-in text-black font-august text-4xl z-20">Viktor Suchomel</h2>
        <div 
        x-data="{ show: false }" 
        x-init="setTimeout(() => show = true, 3000)" 
        class="absolute inset-0 bg-no-repeat bg-right bg-contain opacity-0 transition-opacity duration-1000"
        :class="{ 'opacity-100': show }"
        style="background-image: url('assets/ink_1.png'); background-size: cover; background-position: center;">
        </div>

    </div>
    <div class="h-20"></div>

      <!-- aboutMe -->
    <div class="flex-col justify-center items-center h-1/2 text-center">
            <h1 class=" text-black text-7xl">O mne</h1>
            <p class="text-lg mt-4 text-gray-700 px-20">
            {{ file_get_contents(resource_path('views/content/about_me_description.txt')) }}
            </p>
    </div>
    <div class="relative w-full h-screen flex justify-center items-center bg-cover bg-center text-white" 
        style="background-image: url('/assets/ink_2.png');">
        
 
        <h1 class="relative z-10 text-7xl font-bold">Galerie</h1>
    </div>

    <div class="w-full ">
        @livewire('slider')
    </div>
    <div class="flex text-center items-center justify-center">
        <a href="{{ route('artworks') }}"                     
        wire:navigate.hover>
        <h1 class="font-mono bg-black rounded-full py-4 px-6 text-2xl text-white"> Přejít do galerie</h1>
       </a>
    </div>      

        <div id="homepage-content" class="flex  justify-center items-center h-screen  text-center">
        <div x-data="{ show: false }" x-init="setTimeout(() => show = true, 3000)" 
            class="absolute inset-0 bg-no-repeat bg-right bg-contain opacity-100 transition-opacity duration-1000"
            :class="{ 'opacity-100': show }"
            style="background-image: url('assets/ink_1.png');">
        </div>
    </div>
</div>

@endsection
