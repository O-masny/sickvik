<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;
use Illuminate\Filesystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
     $loader = new FileLoader(new Filesystem(), base_path('lang'));
     $translator = new Translator($loader, app()->getLocale());

     app()->instance('translator', $translator);   
     }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
