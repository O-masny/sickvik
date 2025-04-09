<?php

namespace App\Livewire;

use Livewire\Component;

class Navbar extends Component
{
    public $menuOpenMobile = false;
    public $menuOpenDesktop = false;

    public function toggleMenuMobile()
    {
        $this->menuOpenMobile = !$this->menuOpenMobile;
    }

    public function closeMenuMobile()
    {
        $this->menuOpenMobile = false;
    }

    public function toggleMenuDesktop()
    {
        $this->menuOpenDesktop = !$this->menuOpenDesktop;
    }

    public function closeMenuDesktop()
    {
        $this->menuOpenDesktop = false;
    }

    public function render()
    {
        return view('livewire.navbar');
    }
}
