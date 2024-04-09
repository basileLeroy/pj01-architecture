<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    // public function localeRedirect()
    // {
    //     return redirect(route('welcome', ['locale' => 'fr']));
    // }

    public function showLandingPage ()
    {
        $page = "home";
        $localeLanguage = App::getLocale();

        $article = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();


        return view("pages.guest.home.index")->with('article', $article);
    }
}
