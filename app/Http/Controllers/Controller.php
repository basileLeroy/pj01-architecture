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

        $articles = Article::get()
            ->where('title', '=', $title)
            ->where('language', '=', $localeLanguage);

        
        return view('landing')->with('articles', $articles);
    }

    public function updateArticle(Request $request)
    {
        $page = 'home';
        $articleContent = $request->description; 
        $localeLanguage = App::getLocale();

        $articles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        $articles->article_content = $articleContent;

        $articles->save();
        
        return redirect()->back();
    }
}
