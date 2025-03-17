<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;

class ThemeSwitcher extends Component
{
    public $theme;

    public function mount()
    {
        // Načtení motivu ze session (nebo výchozího)
        $this->theme = Session::get('theme', 'light');
    }

    public function toggleTheme()
    {
        // Přepnutí mezi "light" a "dark"
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';

        // Uložit do session
        Session::put('theme', $this->theme);

        // Emitovat změnu pro aktualizaci na frontendu
        $this->dispatch('themeChanged', $this->theme);
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
