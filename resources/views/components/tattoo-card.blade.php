@props([
    'title' => '',
    'text' => '',
    'image' => '',
    'bg' => 'bg-black',
])

<div 
    x-data="{ shown: false }" 
    x-intersect.once="shown = true"
    :class="shown 
        ? 'opacity-100 translate-y-0' 
        : 'opacity-0 translate-y-10'"
    class="transition-all duration-700 ease-out relative w-full max-w-[100vw] mx-auto overflow-visible text-white {{ $bg }} p-6 md:p-10"
>

    {{-- Pozadí --}}
    <div class="absolute inset-0 z-0 ">
        <img src="{{ $image }}" alt="" class="object-cover w-full h-full opacity-20 pointer-events-none" />
        <div class="absolute inset-0 bg-gradient-to-tr from-black/50 via-transparent to-black/50 mix-blend-overlay"></div>
    </div>

    {{-- Diagonály --}}
    <div class="absolute inset-0 z-10 flex">
        <div class="w-1/2 h-full clip-diagonal-left bg-white/10 backdrop-blur-xl border border-white/10"></div>
        <div class="w-1/2 h-full clip-diagonal-right bg-transparent"></div>
    </div>

    {{-- Nadpis – přes celou šířku --}}
    <div class="relative z-20 w-full mb-6">
   <h2 class="w-full text-white font-extrabold leading-tight tracking-tight drop-shadow-xl 
           text-[clamp(2.5rem,20vw,8rem)] break-words text-center md:text-left">
    {{ $title }}
    </h2>
    </div>

    {{-- Obsah – obrázek vlevo, text vpravo (nebo pod) --}}
    <div class="relative z-20 flex flex-col-reverse md:flex-row items-start justify-between w-full gap-6">

        {{-- Obrázek vlevo dole --}}
        <div class="w-full md:w-1/3 flex justify-start">
            <img 
                src="{{ $image }}" 
                alt="{{ $title }}" 
                class="w-90 h-90 object-cover rounded-xl shadow-xl transform transition-transform duration-500 group-hover:scale-105 group-hover:rotate-1"
            />
        </div>

        {{-- Text vedle nebo nad obrázkem --}}
        <div class="w-full md:w-2/3 text-white text-lg leading-relaxed break-words">
            {{ $text }}
        </div>
    </div>
</div>
