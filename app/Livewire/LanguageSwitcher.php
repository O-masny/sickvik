<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageSwitcher extends Component
{
    public $locale;

    public function mount()
    {
        $this->locale = Session::get('locale', config('app.locale'));
        App::setLocale($this->locale);
    }

    public function toggleLanguage()
    {
        $this->locale = ($this->locale === 'cs') ? 'en' : 'cs';

        Session::put('locale', $this->locale);
        App::setLocale($this->locale);

        return redirect(request()->header('Referer'));     }


    public function render()
    {
        return view('livewire.language-switcher');
    }
}
