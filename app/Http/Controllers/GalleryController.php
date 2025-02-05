<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('gallery.create');
    }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $file = $request->file('image');
        $imagePath = $file->store('gallery', 'public');
        $image = Image::make($file);

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_name' => $file->getClientOriginalName(),
            'file_size' => $file->getSize(),
            'file_format' => $file->getClientOriginalExtension(),
            'width' => $image->width(),
            'height' => $image->height(),
            'image_path' => $imagePath,
        ]);

        return redirect()->route('gallery.index');
    }


    public function edit(Gallery $gallery)
    {
        return view('gallery.edit', compact('gallery'));
    }

   public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($gallery->image_path);
            $file = $request->file('image');
            $imagePath = $file->store('gallery', 'public');
            $image = Image::make($file);

            $gallery->update([
                'image_path' => $imagePath,
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'file_format' => $file->getClientOriginalExtension(),
                'width' => $image->width(),
                'height' => $image->height(),
            ]);
        }

        $gallery->update(['title' => $request->title, 'description' => $request->description]);

        return redirect()->route('gallery.index');
    }
    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->image_path);
        $gallery->delete();

        return redirect()->route('gallery.index');
    }
}