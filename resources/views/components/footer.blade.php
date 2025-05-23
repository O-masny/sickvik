<footer class="bg-white dark:bg-zinc-900 text-gray-800 dark:text-gray-200 border-t border-gray-200 dark:border-zinc-800 mt-24">
    <div class="container mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Left: Logo & Motto -->
        <div class="space-y-4">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/logo/logo.svg') }}" alt="Logo" class="h-12">
            </a>
            <p class="text-sm max-w-xs">
                Autentické tetování v srdci Prahy. Každý motiv je jedinečný – stejně jako ty.
            </p>
        </div>

        <!-- Center: Navigační odkazy -->
        <div class="flex flex-col space-y-2 text-base font-semibold text-gray-600 dark:text-gray-300">
            @foreach([
                ['home', 'messages.home'],
                ['about', 'messages.about'],
                ['artworks', 'messages.gallery'],
                ['knowhow', 'messages.knowhow'],
                ['contact', 'messages.contact'],
            ] as [$route, $label])
                <a href="{{ route($route) }}"
                   class="hover:text-indigo-500 dark:hover:text-pink-400 transition">
                   {{ __($label) }}
                </a>
            @endforeach
        </div>

        <!-- Right: Socials -->
        <div class="flex flex-col items-start">
            <h3 class="text-lg font-bold mb-2">Sleduj nás</h3>
            @include('components.socials')
        </div>
    </div>

    <div class="text-center text-sm text-gray-500 dark:text-gray-600 py-6 border-t border-gray-100 dark:border-zinc-800">
        © {{ date('Y') }} InkZone Studio. Všechna práva vyhrazena.
    </div>
</footer>
