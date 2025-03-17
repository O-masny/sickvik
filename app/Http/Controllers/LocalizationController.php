<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller {
  
public function setLanguage($locale)
    {
        if (in_array($locale, ['cs', 'en'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return response()->json(['locale' => $locale]);
    }
}
