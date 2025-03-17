<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LocalizationController;

use App\Livewire\ArtworkDetail;

Route::get('/', function () {
    return view('home.index', [
    'slot' => 'Content to display in the slot'
]);
});

Route::get('/artworks', [GalleryController::class, 'index']);
Route::get('/artworks/{id}', [GalleryController::class, 'show'])->name('artworks.show');

Route::get('/contact', function () {
    return view('contact.index');
});
Route::get('/care', function () {
    return view('care.index');
});
Route::get('/about', function () {
    return view('about.index');
});

Route::get(
    'locale/{locale}',
    [LocalizationController::class, 'setLanguage']
)->name('locale');
