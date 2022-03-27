<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function localeRedirect()
    {
        return redirect(route('home', ['locale' => 'fr']));
    }

    public function showLanding()
    {
        Artisan::call('storage:link');

        $title = 'landing_Article';
        $localeLanguage = App::getLocale();

        $articles = Article::where('title', '=', $title)
            ->where('language', '=', $localeLanguage)
            ->get();


        return view('landing')->with('articles', $articles);
    }

    public function updateArticle(Request $request)
    {
        $page = 'home';
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
