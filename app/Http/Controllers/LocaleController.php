<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleController extends Controller
{
    public function localeRedirect()
    {
        // if (! in_array($locale, ['en', 'nl', 'fr'])) {
        //     App::setLocale("fr");
        // }

        // App::setLocale($locale);

        return redirect(route('welcome', ['locale' => "fr"]));
    }
}
