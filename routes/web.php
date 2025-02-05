<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('gallery', GalleryController::class);
