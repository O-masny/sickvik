<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome', [
    'slot' => 'Content to display in the slot'
]);
});

Route::get('/contact', function () {
    return view('contact.index');
});
Route::get('/care', function () {
    return view('contact.index');
});
Route::get('/about', function () {
    return view('contact.index');
});
Route::resource('gallery', GalleryController::class);
