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

        $introPage = 'words-home';
        $introArticles = Article::get()
            ->where('language', '=', $localeLanguage)
            ->where('page', '=', $introPage);

        return view('words')->with([
            'articles' => $articles,
            'introArticles' => $introArticles
        ]);
    }


    public function showLink($locale, $title)
    {
        $article = Article::get()
            ->where('title', '=', $title)
            ->where('language', '=', $locale)
            ->first();


        return view('words.article')->with('article', $article);
    }

    public function showIntro(Request $request)
    {
        $page = 'words-home';
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
//TODO: Add content to articles
