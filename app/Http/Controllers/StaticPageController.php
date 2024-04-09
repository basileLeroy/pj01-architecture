<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StaticPageController extends Controller
{
    public function displayWebsiteIntensions ()
    {
        $title = 'intentions_Site';
        $localeLanguage = App::getLocale();
        $matchThese = ['title' => $title, 'language' => $localeLanguage];

        $article = Article::where($matchThese)->first();

        return view("pages.guest.intentions.site")->with([
            "article" => $article
        ]);
    }

    public function displayIntentionsProject () 
    {
        $title = 'intentions_Projects';
        $localeLanguage = App::getLocale();
        $matchThese = ['title' => $title, 'language' => $localeLanguage];

        $article = Article::where($matchThese)->first();

        return view('pages.guest.intentions.projects')->with([
            "article" => $article
        ]);
    }
}
