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

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->get();

        $introPage = 'words-home';
        $introArticles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $introPage)
            ->get();

        return view('words')->with([
            'articles' => $articles,
            'introArticles' => $introArticles
        ]);
    }


    public function showLink($locale, $title)
    {
        $localeLanguage = App::getLocale();
        $article = Article::where('title', '=', $title)
            ->where('language', '=', $localeLanguage)
            ->first();


        return view('words.article')->with('article', $article);
    }

    public function showIntro(Request $request)
    {
        $page = 'words-home';
        $localeLanguage = App::getLocale();
        $articleContent = $request->description;

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        $articles->article_content = $articleContent;

        $articles->save();

        return redirect()->back();
    }

    public function updateArticle(Request $request)
    {
        $page = 'words';
        $articleContent = $request->description;
        $localeLanguage = App::getLocale();

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        $articles->article_content = $articleContent;

        $articles->save();

        return redirect()->back();
    }
}

