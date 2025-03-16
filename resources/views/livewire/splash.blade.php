<div x-data="{ showGif: true }" 
    x-effect="if (showGif) setTimeout(function() {showGif = false}, 2000)">
    <img 
        src="{{ asset('gifs/splash.gif') }}" 
        alt="Animated GIF" 
        class="w-full h-full object-cover"
        x-show="showGif" 
        x-transition.duration.3000ms
    >

</div>
