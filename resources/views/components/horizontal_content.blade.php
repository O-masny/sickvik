<section id="sectionPin" class="relative h-[500vh] overflow-visible">
    <div class="pin-wrap-sticky flex flex-col items-start p-10">
      
        <div class="pin-wrap flex h-screen w-[400vmax] space-x-10 p-10">
           
            <div class="tattoo-card relative bg-black text-white p-6 rounded-lg w-full h-full flex flex-col justify-center items-end">
       
                <h1 class="text-white text-8xl font-bold absolute top-6">{{ __('messages.about') }}</h1>
                <p class="text-2xl text-white mt-6 max-w-2xl z-10 text-right self-end">
                    {{ file_get_contents(resource_path('views/content/about_me_description.txt')) }}
                </p>
            </div>
            <div class="tattoo-card bg-black text-white p-6 rounded-lg w-full h-full flex flex-col justify-center items-center relative">
                <h2 class="text-8xl font-bold absolute top-6">Můj Styl</h2>
                <p class="text-lg absolute bottom-16">Specializuji se na realistické a geometrické tetování.</p>
                <img src="/assets/tattoo-style.jpg" class="w-20 h-20 object-cover absolute right-6 top-6 rounded">
            </div>
            <div class="tattoo-card bg-gray-800 text-white p-6 rounded-lg w-full h-full flex flex-col justify-center items-center relative">
                <h2 class="text-8xl font-bold absolute top-6">Nástroje</h2>
                <p class="text-lg absolute bottom-16">Používám nejmodernější vybavení pro precizní tetování.</p>
                <img src="/assets/tattoo-tools.jpg" class="w-20 h-20 object-cover absolute right-6 top-6 rounded">
            </div>
            <div class="tattoo-card bg-red-700 text-white p-6 rounded-lg w-full h-full flex flex-col justify-center items-center relative">
                <h2 class="text-8xl font-bold absolute top-6">Inspirace</h2>
                <p class="text-lg absolute bottom-16">Každý motiv vychází z osobního příběhu klienta.</p>
                <img src="/assets/tattoo-inspiration.jpg" class="w-20 h-20 object-cover absolute right-6 top-6 rounded">
            </div>
            <div class="tattoo-card bg-blue-300 text-white p-6 rounded-lg w-full h-full flex flex-col justify-center items-center relative">
                <h2 class="text-8xl font-bold absolute top-6">Tetování</h2>
                <p class="text-lg absolute bottom-16">Můj portfolio zahrnuje stovky spokojených klientů.</p>
                <img src="/assets/tattoo-art.jpg" class="w-20 h-20 object-cover absolute right-6 top-6 rounded">
            </div>
            <div class="tattoo-card bg-grey text-white p-6 rounded-lg w-full h-full flex flex-col justify-center items-center relative">
                <h2 class="text-8xl font-bold absolute top-6">Studio</h2>
                <p class="text-lg absolute bottom-16">Přijďte do mého studia a zažijte jedinečnou atmosféru.</p>
                <img src="/assets/tattoo-studio.jpg" class="w-20 h-20 object-cover absolute right-6 top-6 rounded">
            </div>
        </div>
    </div>
</section>