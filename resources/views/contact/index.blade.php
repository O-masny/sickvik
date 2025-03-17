<!-- resources/views/contact/index.blade.php -->
@extends('components.layouts.app')

@section('content')
<div>
      
    <div id="homepage-content" class="hidden flex flex-col justify-center items-center h-screen  text-center">
        <h1 class=" text-black text-7xl z-20">SickVik</h1>
        <h2 class="text-black text-4xl z-20">Viktor Suchomel</h2>
 <div class="container mx-auto p-6">
            <h1 class="text-3xl font-bold mb-4">Contact Us</h1>

            <p>If you have any questions, feel free to reach out to us!</p>

            <form action="#" method="POST" class="mt-6">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-semibold">Your Name</label>
                        <input type="text" id="name" name="name" class="w-full border-gray-300 rounded p-2 mt-1">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold">Your Email</label>
                        <input type="email" id="email" name="email" class="w-full border-gray-300 rounded p-2 mt-1">
                    </div>
                </div>

                <div class="mt-4">
                    <label for="message" class="block text-sm font-semibold">Your Message</label>
                    <textarea id="message" name="message" rows="4" class="w-full border-gray-300 rounded p-2 mt-1"></textarea>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit" class="bg-blue-600 text-white py-2 px-6 rounded">Send Message</button>
                </div>
            </form>
        </div>
</div>
@endsection










