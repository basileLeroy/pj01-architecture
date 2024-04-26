<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;


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

        $slugs = [
            "fr" => "intensions-du-site",
            "en" => "intentions-of-the-website",
            'nl' => "intenties-van-de-website"
        ];

        $request->validate([
            'content.*' => 'required',
        ]);


        if ($request->no_article) {
            foreach ($request->content as $language =>$content) {
                Article::create([
                    "title" => "Intention du Site",
                    "slug" => $slugs[$language],
                    "content" => $content,
                    "language" => $language,
                    "page" => $page,
                    "language_title" => "Intention du Site"
                ]);
            };
        } else {
            foreach ($request->content as $language =>$content) {
                $article = Article::where(["language"=>$language, "page"=>$page])->first();
                $article->content = $content;
                $article->save();
            };
        }

        // return redirect()->route("admin.dashboard")->with(["success"=>"'Intentions du site' a correctement été mis a jour!"]);
        return redirect()->back();
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

        $langTitles = [
            "fr" => "Intensions d'un projet",
            "en" => "Intentions of a project",
            'nl' => "Intenties van een project"
        ];

        $request->validate([
            'content.*' => 'required',
        ]);


        if ($request->no_article) {
            foreach ($request->content as $language =>$content) {
                Article::create([
                    "title" => $langTitles[$language],
                    "slug" => Str::slug($langTitles[$language]),
                    "content" => $content,
                    "language" => $language,
                    "page" => $page,
                    "language_title" => $langTitles[$language]
                ]);
            };
        } else {
            foreach ($request->content as $language =>$content) {
                $article = Article::where(["language"=>$language, "page"=>$page])->first();
                $article->content = $content;
                $article->save();
            };
        }

        return redirect()->back();
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

    public function editBiographyPage ()
    {
        $articles = Article::where("page", "Biography")->get();

        return view("pages.admin.creator.biography.edit", compact("articles"));

    }
    public function updateBiographyPage (Request $request)
    {
        $request->validate([
            'fr.*' => 'required|min:3',
            'en.*' => 'required|min:3',
            'nl.*' => 'required|min:3',
        ]);

        if($request->no_article) {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                Article::create([
                    "title" => "Biography",
                    "slug" => "biography",
                    "content" => $content["content"],
                    "language" => $language,
                    "page" => "Biography",
                    "language_title" => "Biography"
                ]);
            }
        } else {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                $article = Article::where(["language"=>$language, "page"=>"Biography"])->first();
                $article->content = $content["content"];
                $article->save();
            }
        }

        return redirect()->back();
    }

    public function editThoughtsPage ()
    {
        $articles = Article::where("page", "Thoughts")->get();

        return view("pages.admin.thoughts.edit", compact("articles"));
    }

    public function updateThoughtsPage (Request $request)
    {
        $request->validate([
            'fr.*' => 'required|min:3',
            'en.*' => 'required|min:3',
            'nl.*' => 'required|min:3',
        ]);

        if($request->no_article) {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                Article::create([
                    "title" => "Thoughts",
                    "slug" => "thoughts",
                    "content" => $content["content"],
                    "language" => $language,
                    "page" => "Thoughts",
                    "language_title" => "Thoughts"
                ]);
            }
        } else {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                $article = Article::where(["language"=>$language, "page"=>"Thoughts"])->first();
                $article->content = $content["content"];
                $article->save();
            }
        }
        return redirect()->back();
    }

    public function displayStaticPreview()
    {
    }
}
