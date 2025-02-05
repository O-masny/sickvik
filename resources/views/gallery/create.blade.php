@extends('layouts.app')
@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Image</h1>
    <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <input type="text" name="title" placeholder="Title" class="border p-2 w-full rounded">
        <input type="file" name="image" class="border p-2 w-full rounded">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection