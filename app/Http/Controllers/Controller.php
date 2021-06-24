<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showLanding()
    {
        $title = 'landing_Article'; 
        $localeLanguage = App::getLocale();
        $matchThese = ['title' => $title, 'language' => $localeLanguage];

        $articles = Article::where($matchThese)->get();

        
        return view('landing')->with('articles', $articles);
    }

    public function updateArticle(Request $request)
    {
        $title = 'landing_Article';
        $articleContent = $request->description; 
        $localeLanguage = App::getLocale();

        Article::create([
            'title' => $title,
            'article_content' => $articleContent,
            'language' => $localeLanguage,
        ]);
        
        return redirect()->back();
    }
}
