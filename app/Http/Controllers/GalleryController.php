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
            $artworks = Gallery::with('tags')->latest()->get();
            $tags   = \App\Models\Tag::all();
            return view('artworks.index', compact('artworks', 'tags'));
    }

    public function show($id)
    {
        $artwork = Gallery::with('tags')->findOrFail($id);
        $relatedArtworks = Gallery::where('id', '!=', $id)->latest()->take(6)->get();
        $tags = $artwork->tags; // Předání tagů z artworku

        return view('artworks.show', compact('artwork', 'relatedArtworks','tags'));
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
   
}