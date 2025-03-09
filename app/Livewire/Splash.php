<?php

namespace App\Livewire;

use Livewire\Component;

class Splash extends Component
{
    public $isLoading = true;

    protected $listeners = ['fadeOut'];

  public function mount()
    {
        $this->dispatch('fadeOut')->to(ExampleComponent::class);;
    }

     public function fadeOut()
    {
        $this->isLoading = false;
    }

    public function render()
    {
        return view('livewire.splash');
    }
}
