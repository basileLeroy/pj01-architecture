<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class WordsController extends Controller
{
    public function showWords() 
    {
        $page = 'words'; 
        $localeLanguage = App::getLocale();

        $articles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $page);
        
        return view('words')->with('articles', $articles);
    }


    public function showLink($locale, $title) 
    {
        $article = Article::get()
            ->where('title', '=', $title)
            ->where('language', '=', $locale)
            ->first();
        
        
        return view('words.article')->with('article', $article);
    }

}
