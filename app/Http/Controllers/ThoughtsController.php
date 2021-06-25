<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ThoughtsController extends Controller
{
    public function showThoughts()
    {
        $page = 'thoughts'; 
        $localeLanguage = App::getLocale();

        $articles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $page);

        $introPage = 'words-home'; 
        $introArticles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $introPage);

        return view('thoughts')->with([
            'articles' => $articles,
            'introArticles' => $introArticles
        ]);
    }

    public function updateThoughts(Request $request)
    {
        $page = 'thoughts'; 
        $localeLanguage = App::getLocale();
        $articleContent = $request->description; 

        $articles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        $articles->article_content = $articleContent;

        $articles->save();
        
        return redirect()->back();
    }
}
