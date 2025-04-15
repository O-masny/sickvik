<!-- Splash screen -->
<div x-data="{
        visible: true,
    
    }" x-init="document.body.classList.add('overflow-hidden')" x-show="visible"
    x-transition:leave="transition-opacity duration-1000" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="relative w-full min-h-screen bg-black  text-white overflow-hidden flex items-center justify-center">
    <!-- Video background -->
    <video x-ref="video" class="absolute inset-0 w-full h-full object-cover" autoplay muted playsinline
        @ended="hideSplash">
        <source src="{{ asset('gifs/vid.mp4') }}" type="video/mp4">
    </video>
    <div class="z-10 w-full h-full px-4 sm:px-12 md:px-24 flex items-center justify-center text-center">
        <h1 class="font-share-mono font-bold leading-none break-words w-full"
            style="font-size: clamp(2rem, 18vw, 28rem);">
            <span class="inline-block sm:block">SICKVIK</span>
            <span class="inline-block sm:block"></span>
        </h1>
    </div>

</div>