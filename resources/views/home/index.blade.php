<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umění na kůži</title>
    @vite('resources/css/app.css') <!-- Tailwind -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gradient-to-b from-gray-900 to-gray-800 text-white h-screen w-screen overflow-hidden" x-data="{ current: 'homepage' }">

    <!-- Sekce -->
    <div class="h-full w-full relative">
        <!-- HOMEPAGE -->
        <div x-show="current === 'homepage'" x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-4xl md:text-6xl font-semibold mb-4">Umění na kůži</h1>
            <p class="max-w-xl text-lg mb-10 text-gray-300">Každé tetování je jedinečný příběh vyprávěný skrze barvy a linie. Specializujeme se na moderní styly a autorské návrhy.</p>
            
            <div class="flex flex-wrap justify-center gap-4 mb-8">
                <div class="bg-gray-800 p-4 rounded-xl"> 
                    <h3 class="font-semibold">Autorské návrhy</h3>
                    <p class="text-sm text-gray-400">Unikátní designy pro každého klienta</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-xl"> 
                    <h3 class="font-semibold">Profesionální přístup</h3>
                    <p class="text-sm text-gray-400">Nejvyšší standardy hygieny a kvality</p>
                </div>
                <div class="bg-gray-800 p-4 rounded-xl"> 
                    <h3 class="font-semibold">Dlouholeté zkušenosti</h3>
                    <p class="text-sm text-gray-400">Více než 10 let v oboru tetování</p>
                </div>
            </div>

            <button class="bg-gradient-to-r from-pink-500 to-purple-600 px-6 py-2 rounded-full font-semibold">Prohlédnout portfolio</button>
        </div>

        <!-- GALERIE -->
        <div x-show="current === 'galerie'" x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-3xl mb-4">Galerie</h1>
            <p class="text-gray-400 mb-4">Ukázky našich tetování.</p>
            <button class="mt-6 text-sm underline" @click="current = 'homepage'">← Zpět</button>
        </div>

        <!-- O MNĚ -->
        <div x-show="current === 'about'" x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-3xl mb-4">O mně</h1>
            <p class="text-gray-400 mb-4">Něco o mně a mojí cestě tetováním.</p>
            <button class="mt-6 text-sm underline" @click="current = 'homepage'">← Zpět</button>
        </div>

        <!-- PÉČE -->
        <div x-show="current === 'pece'" x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-3xl mb-4">Péče o tetování</h1>
            <p class="text-gray-400 mb-4">Důležité rady pro péči o nové tetování.</p>
            <button class="mt-6 text-sm underline" @click="current = 'homepage'">← Zpět</button>
        </div>

        <!-- KONTAKT -->
        <div x-show="current === 'kontakt'" x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
             class="absolute inset-0 flex flex-col justify-center items-center text-center px-6">
            <h1 class="text-3xl mb-4">Kontakt</h1>
            <p class="text-gray-400 mb-4">Spojte se se mnou ohledně termínu.</p>
            <button class="mt-6 text-sm underline" @click="current = 'homepage'">← Zpět</button>
        </div>
    </div>

    <!-- Navigace -->
    <nav class="absolute bottom-0 w-full bg-black/40 backdrop-blur-md py-4 flex justify-around items-center text-sm border-t border-gray-700">
        <button @click="current = 'homepage'" :class="{ 'text-white font-bold': current === 'homepage' }">🏠 Homepage</button>
        <button @click="current = 'galerie'" :class="{ 'text-white font-bold': current === 'galerie' }">🖼 Galerie</button>
        <button @click="current = 'about'" :class="{ 'text-white font-bold': current === 'about' }">👤 O mně</button>
        <button @click="current = 'pece'" :class="{ 'text-white font-bold': current === 'pece' }">💧 Péče</button>
        <button @click="current = 'kontakt'" :class="{ 'text-white font-bold': current === 'kontakt' }">📞 Kontakt</button>
    </nav>
</body>
</html>
