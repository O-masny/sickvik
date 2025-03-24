@extends('components.layouts.app')

@section('content')
<div>
          <!--     @livewire('splash') -->

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
<section id="sectionPin" class="relative h-[700vh] overflow-visible scroll-smooth">
    <div class=" bg-black ">
      <div class="h-24">    </div>
        @include("components.horizontal_content")
    </div>
</section>

<section id="sectionPin" class="relative overflow-visible">
    <div class="pin-wrap-sticky flex flex-col items-start p-10">
      
    <model-viewer 
            id="girl-model"
            src="{{ asset('assets/3d/model_girl.glb') }}"
            ar
            camera-orbit="0deg 90deg 3m"
            field-of-view="30deg"
            class="w-full h-full">
        </model-viewer>
    </div>
    </section>
</div>
<div
class="h-screen"></div>

</div>

@endsection
@vite("resources/css/app.css")