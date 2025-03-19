<?php

namespace App\Livewire;

use Livewire\Component;

class AnimationWrapper extends Component
{
    public $animation; // Typ animace (např. fade, slide, zoom)
    public $duration = 1; // Doba trvání animace (v sekundách)
    public $delay = 0; // Zpoždění animace

    public function mount($animation = 'fade-in', $duration = 1, $delay = 0)
    {
        $this->animation = $animation;
        $this->duration = $duration;
        $this->delay = $delay;
    }

    public function render()
    {
        return view('livewire.animation-wrapper');
    }
}
