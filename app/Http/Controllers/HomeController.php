<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    // public function localeRedirect()
    // {
    //     return redirect(route('welcome', ['locale' => 'fr']));
    // }

    public function showLandingPage ()
    {
        $page = "home";
        $localeLanguage = App::getLocale();

        $article = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();


        return view("pages.guest.home.index")->with('article', $article);
    }
    public function edit ()
    {
        $page = "home";

        $articles = Article::where('page', '=', $page)
            ->get();

        return view("pages.admin.home.edit")->with('articles', $articles);
    }
    public function update (Request $request)
    {
        $page = "home";
        $validated = $request->validate([
            'fr.*' => 'required|min:3',
            'en.*' => 'required|min:3',
            'nl.*' => 'required|min:3',
        ]);

        // // request stores all date as an associative array for each language
        // foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
        //     $article = new Article();
        //     $article->title = $content["title"];
        //     $article->slug = $page;
        //     $article->page = $page;
        //     $article->content = $content["content"];
        //     $article->language = $language;
        //     $article->save();
        // }

        foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
            $article = Article::where(["language"=>$language, "page"=>$page])->first();
            $article->title = $content["title"];
            $article->content = $content["content"];
            $article->save();
        }

        return redirect()->route("admin.dashboard")->with(["success"=>"La page d'accueil a correctement été mis a jour!"]);
    }
}
