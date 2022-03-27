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

        $page = "home";
        $localeLanguage = App::getLocale();

        $article = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();


        return view('landing')->with('article', $article);
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
        $articles->title = $request->title;

        $articles->save();

        return redirect()->back();
    }
}
