@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Gallery</h1>
    <a href="{{ route('gallery.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Add New Image</a>
    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach($galleries as $gallery)
            <div class="border p-4 rounded">
                <img src="{{ asset('storage/' . \$gallery->image_path) }}" alt="{{ \$gallery->title }}" class="w-full h-48 object-cover rounded">
                <h2 class="text-lg font-bold mt-2">{{ \$gallery->title }}</h2>
                <a href="{{ route('gallery.edit', \$gallery) }}" class="text-blue-500">Edit</a>
                <form action="{{ route('gallery.destroy', \$gallery) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 ml-2">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection