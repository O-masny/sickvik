@extends('components.layouts.app')

@section('content')
<div>

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

<p class="text-subtitle">Vítám Vás na mé osobní stránce. Řemeslu tetování se věnuji od roku 2010 a za tu dobu se stalo mojí skutečnou vášní. Je to nejen má práce, ale také koníček, kterým žiju každý den. Při své tvorbě kladu velký důraz na originalitu, protože věřím, že tetování by mělo odrážet osobnost a jedinečnost každého člověka. Stejně tak dbám na to, aby tetování bylo po zahojení kvalitní a dlouhodobě krásné. Mým cílem je, aby si každý odnesl nejen skvělý zážitek, ale také dílo, na které bude pyšný po celý život. Po osobní konzultaci připravuji motiv každému na míru. Kontaktovat mě můžete prostřednictvím emailu, sociálních sítí a nebo telefonicky. Těším se na naši spolupráci.

</p>
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
            <div class=" bg-black ">
            <div class="h-24">    </div>
                @include("components.horizontal_content")
            </div>        
           @include("components.model_viewer")
        <div class="h-screen"></div>
</div>     
@endsection
@vite("resources/css/app.css")