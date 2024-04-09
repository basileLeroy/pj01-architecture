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

        $articles = Article::where($matchThese)->get();

        return view("pages.guest.intentions.index");
    }
}
