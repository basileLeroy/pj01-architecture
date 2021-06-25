<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BiographyController extends Controller
{
    public function showBio()
    {
        $page = 'biography'; 
        $localeLanguage = App::getLocale();

        $articles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $page);

        $introPage = 'words-home'; 
        $introArticles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $introPage);

        return view('biography')->with([
            'articles' => $articles,
            'introArticles' => $introArticles
        ]);
    }

    public function updateBio(Request $request)
    {
        $page = 'biography'; 
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
