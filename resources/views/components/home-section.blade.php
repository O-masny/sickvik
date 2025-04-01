<!-- Splash screen -->
<div 
    x-data="{
        visible: true,
    
    }"
    x-init="document.body.classList.add('overflow-hidden')" 
    x-show="visible"
    x-transition:leave="transition-opacity duration-1000"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
   class="relative w-full min-h-screen bg-black  text-white overflow-hidden flex items-center justify-center"
>
    <!-- Video background -->
    <video
        x-ref="video"
        class="absolute inset-0 w-full h-full object-cover"
        autoplay
        muted
        playsinline
        @ended="hideSplash"
    >
        <source src="{{ asset('gifs/vid.mp4') }}" type="video/mp4">
    </video>

    <!-- Text in center of splash -->
    <div class="z-10 text-center">
        <h1 class="font-share-mono text-7xl animate-fade-in">SickVik</h1>
        <h2 class="font-august text-4xl mt-2 animate-fade-in delay-500">Viktor Suchomel</h2>
    </div>
</div>