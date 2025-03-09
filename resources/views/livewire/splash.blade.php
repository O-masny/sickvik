<div x-data="{ showGif: true }" 
    x-effect="if (showGif) setTimeout(function() {showGif = false}, 2000)">
    <img 
        src="{{ asset('gifs/splash.gif') }}" 
        alt="Animated GIF" 
        class="w-full h-full object-cover"
        x-show="showGif" 
        x-transition.duration.3000ms
    >

    <div x-show="!showGif" x-transition.opacity.duration.1000ms class="absolute inset-0 bg-white flex items-center justify-center">
        <h1 class="text-[128px] font-heyaugust text-gray-800">SickVik</h1>
    </div>
</div>
