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

        return view("pages.admin.home.edit", compact("articles"));
    }
    public function update (Request $request)
    {
        $page = "home";

        $request->validate([
            'fr.*' => 'required|min:3',
            'en.*' => 'required|min:3',
            'nl.*' => 'required|min:3',
        ]);

        if ($request->no_article) {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                Article::create([
                    "title" => $content["title"],
                    "slug" => "home",
                    "content" => $content["content"],
                    "language" => $language,
                    "page" => $page,
                    "language_title" => "home"
                ]);
            }
        } else {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                $article = Article::where(["language"=>$language, "page"=>$page])->first();
                $article->title = $content["title"];
                $article->content = $content["content"];
                $article->save();
            }
        }
        return redirect()->back();
    }
}