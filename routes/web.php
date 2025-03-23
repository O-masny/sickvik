<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LocalizationController;

use App\Livewire\ArtworkDetail;

Route::get('/', function () {
    return view('home.index', [
    'slot' => 'Content to display in the slot'
]);
})->name('home');

Route::get('/artworks', [GalleryController::class, 'index'])->name('artworks');
Route::get('/artworks/{id}', [GalleryController::class, 'show'])->name('artworks.show');

Route::get('/contact', function () {
    return view('contact.index');
})->name("contact");

Route::get('/care', function () {
    return view('care.index');
})->name("care");

Route::get('/about', function () {
    return view('about.index');
})->name("about");

Route::get(
    'locale/{locale}',
    [LocalizationController::class, 'setLanguage']
)->name('locale');
