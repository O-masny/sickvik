<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AnimationWrapper extends Component
{
    public $animation;
    public $duration;
    public $delay;

    public function __construct($animation = 'fade-in', $duration = 1, $delay = 0)
    {
        $this->animation = $animation;
        $this->duration = $duration;
        $this->delay = $delay;
    }

    public function render()
    {
        return view('components.animation-wrapper');
    }
}