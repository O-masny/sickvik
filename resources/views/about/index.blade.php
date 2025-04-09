@extends('components.layouts.app')

<style>
  :root {
    --cardHeight: 130vh;
    --cardTopPadding: 12rem;
  }

  .background-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url('/assets/background/ink_bg.webp') no-repeat center center;
    background-size: cover;
    z-index: 0;
    opacity: 0.15;
    pointer-events: none;
  }

  #cards {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: repeat(auto, var(--cardHeight));
    gap: 0;
    padding-bottom: 10vh;
    position: relative;
    z-index: 1;
  }

  .stacked-card {
    position: sticky;
    top: 0;
    padding-top: calc(var(--index) * var(--cardTopPadding));
    height: var(--cardHeight);
    width: 100vw;
    background-color: var(--yellow-saffron);
    z-index: calc(10 + var(--index));
    border-radius: 1.5rem;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: flex-start;
  }

  /* RESPONSIVE FIX */
  @media (max-width: 768px) {
    :root {
      --cardTopPadding: 8rem;
      --cardHeight: 160vh;
    }

    .card-content--container {
      flex-direction: column;
      padding: 1.5rem;
      max-width: 100%;
    }

    .card--title {
      font-size: 1.5rem;
      line-height: 2rem;
    }

    .card--content-item--title {
      font-size: 0.875rem;
      padding: 0.25rem 0.5rem;
    }

    .card--content-item--description {
      font-size: 0.875rem;
    }

    .card-img--container img {
      width: 100%;
      height: auto;
      object-fit: contain;
    }
  }
</style>


@section('content')
  <div class="background-overlay"></div>

  <div class="body bg-gray-pampas">
    <section class="section mb-16">
    <div class="w-layout-hflex services--heading">
      <h2 class="heading-copy">{{ __('messages.about') }}</h2>
      <div class="text-block">
      {{ __('messages.about_subtitle') }}
      </div>
    </div>
    </section>

    {{-- STACKING CARDS --}}
    <ul id="cards">
    @foreach (range(1, 4) as $i)
    <li class="stacked-card" style="--index: {{ $i }}">
      <div class="card-content--container p-10 rounded-2xl shadow-md h-full w-full max-w-[1124px] mx-auto relative">
      <img src="images/hyperlink-redirect.svg" loading="lazy" width="27" alt="" class="image mb-4">

      <div class="card--description mb-6">
      <div class="card--title text-4xl font-bold mb-4">
      {{ __('messages.tattoo_card_title_' . $i) }}
      </div>
      <div class="card-img--container mb-6">
      <img src="images/Website-3.0-Design.webp" loading="lazy" class="image-2 w-full h-auto rounded-xl"
        alt="tattoo-image">
      </div>
      </div>

      <div class="card--content space-y-4">
      <div class="card--content-item">
      <div class="card--content-item--title bg-black text-white inline-block px-3 py-1 rounded">
        {{ __('messages.tattoo_card_highlight_' . $i) }}
      </div>
      <div class="card--content-item--description mt-2 text-base text-black">
        {{ __('messages.tattoo_card_text_' . $i) }}
      </div>
      </div>
      </div>
      </div>
    </li>
  @endforeach
    </ul>

    {{-- Zbytek stránky --}}
    <div class="div-block mt-32">
    @for ($i = 0; $i < 8; $i++)
    <h1 class="heading-2">{{ __('messages.headline') }}</h1>
  @endfor
    </div>
  </div>
@endsection