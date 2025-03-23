<?php

namespace App\Livewire;

use Livewire\Component;

class GallerySlider extends Component
{
    public $images = [];

    public function mount($images)
    {
        // Extrahujeme pouze data z paginatoru a reindexujeme pole
        $this->images = array_values($images->toArray()['data']);
    }

    public function render()
    {
        // Znovu indexujeme pole, aby klíče byly číselné od 0
        $imagesArray = array_values($this->images);

        // Rozdělíme obrázky do tří skupin podle indexu
        $leftColumn = array_filter($imagesArray, fn($img, $index) => $index % 3 === 0, ARRAY_FILTER_USE_BOTH);
        $middleColumn = array_filter($imagesArray, fn($img, $index) => $index % 3 === 1, ARRAY_FILTER_USE_BOTH);
        $rightColumn = array_filter($imagesArray, fn($img, $index) => $index % 3 === 2, ARRAY_FILTER_USE_BOTH);

        return view('livewire.gallery-slider', compact('leftColumn', 'middleColumn', 'rightColumn'));
    }
}
