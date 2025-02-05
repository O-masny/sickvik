@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Image</h1>
    <form action="{{ route('gallery.update', \$gallery) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ \$gallery->title }}" class="border p-2 w-full rounded">
        <input type="file" name="image" class="border p-2 w-full rounded">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection