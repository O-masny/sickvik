<?php

namespace App\Livewire;

use Livewire\Component;

class ContactCard extends Component
{
    public $name = '';
    public $email = '';
    public $message = '';

    public function submit()
    {
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ]);

        session()->flash('success', 'Díky! Ozvu se co nejdřív.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.contact-card');
    }
}
