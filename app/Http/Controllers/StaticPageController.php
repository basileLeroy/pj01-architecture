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

        return view("pages.admin.intentions.site.edit")->with([
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

        return redirect()->route("admin.dashboard")->with(["success"=>"'Intentions du site' a correctement été mis a jour!"]);
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
    public function editProjectIntensions()
    {
        $page = 'intentions-projects';
        $params = ['page' => $page];

        $articles = Article::where($params)->get();

        return view("pages.admin.intentions.project.edit")->with([
            "articles" => $articles
        ]);
    }
    public function updateProjectIntensions(Request $request)
    {
        $page = 'intentions-projects';

        $validated = $request->validate([
            'content.*' => 'required|min:3',
        ]);

        // foreach ($request->content as $language => $content) {
        //     $article = new Article();
        //     // $article = Article::where(["language"=>$language, "page"=>$page])->first();
        //     $article->title = "Intentions lors d'un projet";
        //     $article->slug = $page;
        //     $article->page = $page;
        //     $article->content = $content;
        //     $article->language = $language;
        //     $article->save();
        // }

        foreach ($request->content as $language =>$content) {
            $article = Article::where(["language"=>$language, "page"=>$page])->first();
            $article->content = $content;
            $article->save();
        }

        return redirect()->route("admin.dashboard")->with(["success"=>"Intentions lors d'un projet a correctement été mis a jour!"]);
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

    public function editContactPage ()
    {
        $contact = Author::first();

        return view('pages.admin.creator.contact.edit', compact("contact"));
    }

    public function updateContactPage (Request $request)
    {
        $request->validate([
            "first_name" => "required",
            "last_name" => "required",
            "address" => "required",
            "city" => "required",
            "zip" => "required|integer",
            "country" => "required",
            "phone" => "required",
            "email" => "required|email",
        ]);
        
        $author = Author::first();


        $author->update([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "address" => $request->address,
            "city" => $request->city,
            "zip" => $request->zip,
            "country" => $request->country,
            "phone" => $request->phone,
            "email" => $request->email,
        ]);

        return redirect()->back();
    }

    public function displayStaticPreview()
    {
    }
}
