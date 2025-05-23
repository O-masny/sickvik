@extends('components.layouts.app')

@section('content')
<section class="relative bg-white dark:bg-zinc-900 text-black dark:text-white py-24 overflow-hidden transition-colors duration-300">
  <div class="absolute top-0 left-0 w-40 h-40 bg-black/10 dark:bg-pink-500/30 rounded-full blur-3xl z-0 animate-pulse"></div>
  <div class="absolute bottom-10 right-10 w-32 h-32 bg-black/5 dark:bg-yellow-400/20 rounded-full blur-2xl z-0"></div>

  <div class="relative z-10 container mx-auto px-6">
    <h1 class="text-5xl font-extrabold tracking-tight mb-6" data-aos="fade-down">
      Kontaktuj studio
    </h1>
    <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl mb-12" data-aos="fade-up" data-aos-delay="100">
      Máš dotaz, zájem o termín nebo spolupráci? Napiš nám – ozveme se co nejdříve!
    </p>

    <div class="grid md:grid-cols-2 gap-12 items-start">
      <!-- Contact Form -->
      <form method="POST" action="{{ route('contact.send') }}" class="space-y-6" data-aos="fade-right" data-aos-delay="200">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-900 dark:text-gray-200">Jméno</label>
          <input type="text" name="name" required class="mt-1 w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-900 dark:text-gray-200">Email</label>
          <input type="email" name="email" required class="mt-1 w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500">
        </div>
        <div>
          <label for="message" class="block text-sm font-medium text-gray-900 dark:text-gray-200">Zpráva</label>
          <textarea name="message" rows="5" required class="mt-1 w-full bg-gray-100 dark:bg-gray-800 border border-gray-300 dark:border-gray-700 rounded-xl px-4 py-3 text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-pink-500"></textarea>
        </div>
        <button type="submit" class="bg-black dark:bg-pink-600 hover:bg-gray-800 dark:hover:bg-pink-700 transition px-6 py-3 rounded-xl font-semibold shadow-md text-white">
          Odeslat zprávu
        </button>
      </form>

      <!-- Studio Info -->
      <div class="space-y-6 text-lg text-gray-800 dark:text-gray-200" data-aos="fade-left" data-aos-delay="300">
        <div>
          <h3 class="text-xl font-bold text-black dark:text-white mb-1">📍 Studio InkZone</h3>
          <p>Revoluční 123, Praha 1<br>Otevřeno: Po–Pá 10:00–18:00</p>
        </div>
        <div>
          <h3 class="text-xl font-bold text-black dark:text-white mb-1">📞 Telefon & Email</h3>
          <p>
            <a href="tel:+420123456789" class="underline hover:text-pink-600 dark:hover:text-pink-400">+420 123 456 789</a><br>
            <a href="mailto:studio@inkzone.cz" class="underline hover:text-pink-600 dark:hover:text-pink-400">studio@inkzone.cz</a>
          </p>
        </div>
        <div>
          <h3 class="text-xl font-bold text-black dark:text-white mb-1">📱 Sociální sítě</h3>
          <p class="flex gap-4">
            <a href="#" class="hover:text-pink-600 dark:hover:text-pink-400">Instagram</a>
            <a href="#" class="hover:text-pink-600 dark:hover:text-pink-400">Facebook</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
