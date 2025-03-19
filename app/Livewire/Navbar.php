<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $menuOpen = false;

    public function toggleMenu()
    {
        $this->menuOpen = !$this->menuOpen;
    }

    public function closeMenu()
    {
        $this->menuOpen = false;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
