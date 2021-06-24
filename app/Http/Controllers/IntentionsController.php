<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IntentionsController extends Controller
{
    public function showIntentionsSite()
    {
        $title = 'intentions_Site'; 
        $localeLanguage = App::getLocale();
        $matchThese = ['title' => $title, 'language' => $localeLanguage];

        $articles = Article::where($matchThese)->get();
        
        return view('intentionsWebsite')->with('articles', $articles);
    }
    public function updateIntentionsSite(Request $request)
    {
        $title = 'intentions_Site';
        $articleContent = $request->description; 
        $localeLanguage = App::getLocale();

        Article::create([
            'title' => $title,
            'article_content' => $articleContent,
            'language' => $localeLanguage,
        ]);
        
        return redirect()->back();
    }
    public function showIntentionsProject()
    {
        $title = 'intentions_Projects'; 
        $localeLanguage = App::getLocale();
        $matchThese = ['title' => $title, 'language' => $localeLanguage];

        $articles = Article::where($matchThese)->get();
        
        return view('intentionsProjects')->with('articles', $articles);

    }
    public function updateIntentionsProject(Request $request)
    {
        $title = 'intentions_Projects';
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
