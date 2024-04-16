<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class StaticPageController extends Controller
{
    public function displayWebsiteIntensions()
    {
        $page = 'intentions-site';
        $localeLanguage = App::getLocale();
        $params = ['page' => $page, 'language' => $localeLanguage];

        $article = Article::where($params)->first();

        return view("pages.guest.intentions.site")->with([
            "article" => $article
        ]);
    }
    public function editWebsiteIntensions()
    {
        $page = 'intentions-site';
        $params = ['page' => $page];

        $articles = Article::where($params)->get();

        return view("pages.admin.intentions.edit")->with([
            "articles" => $articles
        ]);
    }
    public function updateWebsiteIntensions(Request $request)
    {
        $page = 'intentions-site';

        $validated = $request->validate([
            'content.*' => 'required',
        ]);

        foreach ($request->content as $language =>$content) {
            $article = Article::where(["language"=>$language, "page"=>$page])->first();
            $article->content = $content;
            $article->save();
        };

        return redirect()->route("admin.dashboard");
    }

    public function displayIntentionsProject()
    {
        $page = 'intentions-projects';
        $localeLanguage = App::getLocale();
        $params = ['page' => $page, 'language' => $localeLanguage];

        $article = Article::where($params)->first();

        return view('pages.guest.intentions.projects')->with([
            "article" => $article
        ]);
    }

    public function displayThoughts()
    {
        $page = 'thoughts';
        $localeLanguage = App::getLocale();
        $params = ['page' => $page, 'language' => $localeLanguage];

        $article = Article::where($params)->first();

        return view('pages.guest.thoughts.index')->with([
            "article" => $article
        ]);
    }

    public function displayBiography()
    {
        $page = 'biography';
        $localeLanguage = App::getLocale();
        $params = ['page' => $page, 'language' => $localeLanguage];

        $article = Article::where($params)->first();

        return view('pages.guest.biography.index')->with([
            "article" => $article
        ]);
    }

    public function displayContact()
    {
        $contact = Author::first();

        return view('pages.guest.contact.index', compact("contact"));
    }

    public function displayStaticPreview()
    {
    }
}
