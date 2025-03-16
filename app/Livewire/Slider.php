<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class Slider extends Component
{
    public $images = [];

    public function mount()
    {
        $this->loadImages();
    }

    public function loadImages()
    {
        // Cache výsledky na 10 minut pro rychlejší načítání
        $this->images = Cache::remember('gallery_images', 600, function () {
            $directory = public_path('assets/gallery');
            $files = File::files($directory);

            return collect($files)
                ->filter(fn($file) => in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp']))
                ->map(fn($file) => '/assets/gallery/' . $file->getFilename())
                ->toArray();
        });

        // Emit event pro JS (restart slideru po načtení obrázků)
        $this->dispatch('imagesLoaded');
    }

    public function refreshImages()
    {
        // Vyprázdnění cache a znovunačtení obrázků
        Cache::forget('gallery_images');
        $this->loadImages();
    }

    public function render()
    {
        return view('livewire.slider');
    }
}
