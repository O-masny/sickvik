<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\File;

class Slider extends Component
{
    public $images = [];

    public function mount()
    {
        // Získání všech JPG obrázků z public/assets/gallery
        $directory = public_path('assets/gallery');
        $files = File::files($directory);

        foreach ($files as $file) {
            if (in_array($file->getExtension(), ['jpg', 'jpeg', 'png', 'webp'])) {
                $this->images[] = '/assets/gallery/' . $file->getFilename();
            }
        }
    }

    public function render()
    {
        return view('livewire.slider');
    }
}
