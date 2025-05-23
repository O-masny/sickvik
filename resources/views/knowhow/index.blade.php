@extends('components.layouts.app')

@section('content')
<section class="relative py-24 bg-white dark:bg-zinc-900 text-gray-900 dark:text-white overflow-hidden transition-colors duration-300">

  {{-- Asymetrické barevné vrstvy --}}
  <div class="absolute inset-0 z-0 pointer-events-none">
    <div class="absolute top-[-40px] right-[-60px] w-96 h-96 bg-gradient-to-br from-pink-300 via-yellow-100 to-transparent dark:from-pink-700 dark:via-yellow-500 rounded-full blur-3xl opacity-30"></div>
    <div class="absolute bottom-[-80px] left-[-60px] w-[500px] h-[500px] bg-gradient-to-tr from-indigo-200 via-purple-100 to-transparent dark:from-indigo-700 dark:via-purple-800 rounded-full blur-[100px] opacity-20"></div>
  </div>

  <div class="relative z-10 container mx-auto px-6">
    <div class="flex flex-col lg:flex-row items-center lg:items-start gap-16 lg:gap-24">
      
      <!-- LEFT IMAGE -->
      <div class="w-full lg:w-5/12 relative" data-aos="fade-right">
        <img src="{{ asset('ink_1.png') }}" alt="Tattoo care" class="rounded-3xl shadow-2xl">
        <div class="absolute -top-6 -left-6 w-24 h-24 bg-gradient-to-tr from-pink-500 to-yellow-400 dark:from-pink-600 dark:to-yellow-300 rounded-full blur-xl opacity-60 z-[-1]"></div>
      </div>

      <!-- RIGHT CONTENT -->
      <div class="w-full lg:w-7/12 space-y-10" data-aos="fade-left">
        <h2 class="text-4xl md:text-5xl font-extrabold leading-tight">
          Profesionální péče<br class="hidden sm:inline"> o tetování
        </h2>
        <p class="text-lg text-gray-700 dark:text-gray-300 max-w-2xl">
          Kvalitní péče je základem pro krásný a trvalý vzhled tetování. Věnuj svému inkoustu maximum už od prvního dne.
        </p>
        
        <div class="grid sm:grid-cols-2 gap-6">
          @foreach([
            ['🧼', 'Před zákrokem', 'Pokožku hydratuj a vyhýbej se opalování nebo mechanickému podráždění.', 'pink-500'],
            ['💉', 'Po tetování', 'Používej doporučenou mast, pokožku nech dýchat a nenamáčej ji.', 'indigo-500'],
            ['🌤️', 'Ochrana', 'Vyhýbej se slunci a saunám alespoň 2 týdny po zákroku.', 'blue-500'],
            ['📆', 'Dlouhodobá péče', 'Hydratace a SPF ochrana pomáhá udržet barvy syté i po letech.', 'green-500'],
          ] as [$icon, $title, $desc, $color])
          <div class="bg-gray-50 dark:bg-zinc-800 p-6 rounded-xl border-l-4 border-{{ $color }} shadow-md hover:shadow-xl transition duration-300">
            <h4 class="text-lg font-semibold mb-1">{{ $icon }} {{ $title }}</h4>
            <p class="text-sm text-gray-700 dark:text-gray-300">{{ $desc }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
