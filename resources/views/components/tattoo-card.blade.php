@props([
    'title' => '',
    'text' => '',
    'image' => '',
    'bg' => 'bg-black',
])

<div class="relative tattoo-card w-full h-full rounded-xl overflow-hidden text-white {{ $bg }} flex items-center justify-center">

    {{-- Pozadí obrázku --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ $image }}" class="object-cover w-full h-full opacity-20" />
    </div>

    {{-- Diagonální glass vrstvy --}}
    <div class="absolute inset-0 z-10 flex">
        <div class="w-1/2 h-full clip-diagonal-left bg-white/10 backdrop-blur-md"></div>
        <div class="w-1/2 h-full clip-diagonal-right bg-transparent"></div>
    </div>

    {{-- Obsah karty (texty a obrázek) --}}
    <div class="relative  z-20 w-full h-full flex items-center justify-between p-10">
        <div class="w-1/2 text-left space-y-6">
            <h2 class="text-5xl font-extrabold text-white drop-shadow-lg">{{ $title }}</h2>
            <p class="text-lg text-white drop-shadow-md max-w-md">{{ $text }}</p>
        </div>
        <div class="w-1/2 flex justify-center items-center ">
            <img src="{{ $image }}" alt="{{ $title }}" class="w-40 h-40 object-cover rounded-xl shadow-xl" />
        </div>
    </div>
</div>
