<div x-data="{ mobileMenuOpen: false, isScrolling: false }" 
     x-init="window.addEventListener('scroll', () => { isScrolling = window.scrollY > 50 })">
    <nav :class="{'bg-opacity-75': isScrolling, 'bg-opacity-100': !isScrolling}" 
         class="bg-gray-800 text-white fixed w-full bottom-0 left-0 z-10 p-4 transition-opacity duration-300">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold">SickVik</a>

            <!-- Desktop Menu -->
            <div class="space-x-4 hidden lg:flex">
                <a href="/" 
                   class="hover:text-gray-400" 
                   :class="{'text-xl': window.location.pathname === '/' }">
                    Home
                </a>
                <a href="/about" 
                   class="hover:text-gray-400" 
                   :class="{'text-xl': window.location.pathname === '/about' }">
                    About
                </a>
                <a href="/services" 
                   class="hover:text-gray-400" 
                   :class="{'text-xl': window.location.pathname === '/services' }">
                    Services
                </a>
                <a href="/contact" 
                   class="hover:text-gray-400" 
                   :class="{'text-xl': window.location.pathname === '/contact' }">
                    Contact
                </a>
                <a href="/blog" 
                   class="hover:text-gray-400" 
                   :class="{'text-xl': window.location.pathname === '/blog' }">
                    Blog
                </a>
            </div>

            <!-- Mobile Menu Button (Hamburger) -->
            <div class="lg:hidden">
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white">
                    <i class="fas fa-bars"></i> <!-- Přidejte vlastní ikonu nebo použijte FontAwesome -->
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" x-transition class="lg:hidden absolute top-0 left-0 right-0 bg-gray-800 text-white p-4">
            <a href="/" class="block py-2" @click="mobileMenuOpen = false" :class="{'text-xl': window.location.pathname === '/' }">Home</a>
            <a href="/about" class="block py-2" @click="mobileMenuOpen = false" :class="{'text-xl': window.location.pathname === '/about' }">About</a>
            <a href="/services" class="block py-2" @click="mobileMenuOpen = false" :class="{'text-xl': window.location.pathname === '/services' }">Services</a>
            <a href="/contact" class="block py-2" @click="mobileMenuOpen = false" :class="{'text-xl': window.location.pathname === '/contact' }">Contact</a>
            <a href="/blog" class="block py-2" @click="mobileMenuOpen = false" :class="{'text-xl': window.location.pathname === '/blog' }">Blog</a>
        </div>
    </nav>
</div>
