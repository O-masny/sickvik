<div>
    <button wire:click="toggleTheme"
        class="relative inline-flex flex-shrink-0 h-6 mr-5 transition-colors duration-200 ease-in-out border-2 border-transparent rounded-full cursor-pointer bg-zinc-200 dark:bg-zinc-700 w-11 focus:outline-none focus:ring-2 focus:ring-neutral-700 focus:ring-offset-2"
        role="switch"
        aria-checked="{{ $theme === 'dark' ? 'true' : 'false' }}">
        
        <span class="sr-only">Toggle Dark Mode</span>

        <span class="relative inline-block w-5 h-5 transition duration-500 ease-in-out transform bg-white rounded-full shadow pointer-events-none"
            @class(['translate-x-5' => $theme === 'dark', 'translate-x-0' => $theme === 'light'])>
        </span>
    </button>

    <script>
        Livewire.on('themeChanged', theme => {
            document.documentElement.classList.toggle('dark', theme === 'dark');
            localStorage.setItem('theme', theme);
        });

        // Nastavení na základě LocalStorage po načtení stránky
        document.addEventListener("DOMContentLoaded", function () {
            let savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.classList.toggle('dark', savedTheme === 'dark');
            Livewire.dispatch('themeChanged', savedTheme);
        });
    </script>
</div>
