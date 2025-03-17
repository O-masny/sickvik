@extends('components.layouts.app')
@section('content')

<div x-data="{ hideContent: false }">
    <div class="container mx-auto p-4">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Image -->
            <div 
                class="w-full md:w-2/3 transition-all duration-700"
                x-ref="image"
                x-bind:class="hideContent ? 'opacity-0 translate-x-[-50px]' : 'opacity-100 translate-x-0'"
            >
                <img src="{{ asset('storage/gallery/' . $artwork->file_name) }}" 
                     class="w-full h-auto rounded shadow-lg">
            </div>

            <!-- Info Section -->
            <div 
                class="w-full md:w-1/3 sticky top-0 p-4 bg-white shadow-md rounded-lg transition-all duration-700"
                x-ref="title"
                x-bind:class="hideContent ? 'opacity-0 translate-y-[-50px]' : 'opacity-100 translate-y-0'"
            >
                <h1 class="text-3xl font-bold">{{ $artwork->title }}</h1>
                <p class="text-gray-600 mt-2">{{ $artwork->description }}</p>
                <p class="text-sm text-gray-500 mt-2">Přidáno: {{ $artwork->created_at->format('d.m.Y') }}</p>

                <!-- Tagy -->
                @if ($artwork->tags->isNotEmpty())
                    <div class="mt-4">
                        @foreach ($artwork->tags as $tag)
                            <span class="bg-blue-200 text-blue-800 text-xs font-semibold px-2 py-1 rounded-full mr-2">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Slider -->
    <div class="w-screen transition-all duration-700 opacity-0 translate-y-10" 
        x-ref="slider">
        @livewire('slider')
    </div>
</div>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    document.querySelector('[x-ref="image"]').classList.add("opacity-0", "-translate-x-10");
                    document.querySelector('[x-ref="title"]').classList.add("opacity-0", "-translate-y-10");

                    setTimeout(() => {
                        document.querySelector('[x-ref="slider"]').classList.remove("opacity-0", "translate-y-10");
                    }, 500);
                }
            });
        }, { threshold: 0.2 });

        observer.observe(document.querySelector('[x-ref="image"]'));
    });
</script>
