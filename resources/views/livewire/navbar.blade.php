<div class="bg-gray-800 text-white">
    <nav class="container mx-auto p-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold">MyApp</a>

        <div class="space-x-4">
            <a href="/" class="hover:text-gray-400">Home</a>
            <a href="/about" class="hover:text-gray-400">About</a>
            <a href="/contact" class="hover:text-gray-400">Contact</a>
        </div>

        <div class="lg:hidden">
            <!-- Mobile menu button (hamburger) -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="lg:hidden absolute top-0 left-0 right-0 bg-gray-800 text-white p-4">
            <a href="/" class="block py-2">Home</a>
            <a href="/about" class="block py-2">About</a>
            <a href="/contact" class="block py-2">Contact</a>
        </div>
    </nav>
</div>
