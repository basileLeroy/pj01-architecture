<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class WordController extends Controller
{
    /**
     * This is not a conventional controller.
     * The index is for the "words" page displaying Marc's own articles.
     * 
     * The others method is for all the other articles Marc is sharing.
     * 
     * Both have "show" pages that go to the same method "show"
     * since they return the same content.
     */

    public function index ()
    {
        // Get Primary article for the index page written by Marc Belderbos
        $primary = Word::where("language", app()->getLocale())
            ->where('is_primary', true)
            ->where('author', 'Marc Belderbos')
            ->select('author','content')
            ->first();

        // Get all other articles excluding the primary one
        // Only select all non primary articles written by Marc Belderbos
        $articles = Word::where("language", app()->getLocale())
            ->where('is_primary', false)
            ->where('author', 'Marc Belderbos')
            ->select('title', 'slug', 'cover')
            ->get();
        
        // Return or pass the articles to a view
        return view("pages.guest.words.index", compact('primary', 'articles'));
    }

    public function edit ()
    {
        $primary = Word::where('is_primary', true)
        ->where('author', 'Marc Belderbos')
        ->select('slug','author','content', 'language')
        ->get();

        $articles = Word::where("language", "fr")
            ->where('is_primary', false)
            ->where('author', 'Marc Belderbos')
            ->select('id','title', 'slug', 'cover')
            ->get();

        return view("pages.admin.words.marc.index", compact('primary', 'articles'));
    }

    public function editDetail ($slug) 
    {
        $articles = Word::where([
                "is_primary" => false,
                "author" => "Marc Belderbos",
                "slug" => $slug
            ])
            ->select('title', 'slug', 'cover', 'content', 'language')
            ->get();

        // the cover image and title for the articles
        $page = $articles[0];

        return view("pages.admin.words.marc.edit", compact('articles', 'page'));
    }

    public function store (Request $request, $urlSlug) 
    {
        $languages = ["nl", "fr", "en"];

        $request->validate([
            "title" => "required",
            "cover"=>"image|mimes:jpeg,png,jpg,gif,svg|max:5048",
        ]);

        $is_primary = $request->is_primary;
        $author = $request->author;
        $cover = $request->cover;
        $slug = $urlSlug ?? Str::slug($request->title);

        foreach($languages as $language) {

            if($language === "nl") {
                $content = "<p>Er is nog geen inhoud beschikbaar.</p>";
            } else if ($language === "fr") {
                $content = "<p>Aucun contenu disponible pour le moment.</p>";
            } else {
                $content = "<p>No content available yet.</p>";
            }

            if($request->cover) {
                $cover = Storage::disk('public')->put('images/words/' . $slug . '/cover/', $request->cover);
            };

            Word::create([
                "is_primary" => $is_primary,
                "title" => $request->title,
                "slug" => $slug,
                "author" => $author,
                "cover" => "storage/" . $cover,
                "content" => $content,
                "language" => $language
            ]);

        }
        return redirect()->back();
    }

    // updating articles
    public function update (Request $request)
    {
        $languages = ["nl", "fr", "en"];

        $request->validate([
            "cover"=>"image|mimes:jpeg,png,jpg,gif,svg|max:5048",

            "nl.title" => "required",
            "nl.content" => "required",

            "fr.title" => "required",
            "fr.content" => "required",

            "en.title" => "required",
            "en.content" => "required",
        ]);

        $cover = $request->cover ?? null;

        $is_primary = $request->is_primary;
        $author = $request->author;

        foreach ($languages as $lang) {
            $title = "";
            $content = "";
            

            if ($lang == "nl") {
                $title = $request->nl["title"];
                $content = $request->nl["content"];
                $slug = $request->nl["slug"] ?? null;

            } else if ($lang == "en") {
                $title = $request->en["title"];
                $content = $request->en["content"];
                $slug = $request->en["slug"] ?? null;


            } else {
                $title = $request->fr["title"];
                $content = $request->fr["content"]; 
                $slug = $request->fr["slug"] ?? null;           
            }

            if($request->slug) {
                $slug = $request->slug;
            }

            $article = Word::where(["slug" => $slug, "language" => $lang])->first();
            $article->is_primary = $is_primary;
            $article->author = $author;

            if ($title !== $article->title) {
                $article->title = $title;
            }

            if ($content !== $article->content) {
                $article->content = $content;
            }

            if ($cover !== null) {
                $storagePathToCover = substr($article->cover, 8);
                if (Storage::disk("public")->exists($storagePathToCover)) {
                    Storage::disk("public")->delete($storagePathToCover);
                }

                $newCoverImage = Storage::disk('public')->put('images/words/' . $slug . '/cover/', $cover);
                $article->cover = 'storage/' . $newCoverImage;
            }

            $article->save();
        }

        return redirect()->back();
    }

    public function other () 
    {
        // Get Primary article for the index page dedicated to other authors
        $primary = Word::where("language", app()->getLocale())
            ->where('is_primary', true)
            ->where('author', 'Others')
            ->select('author','content')
            ->first();
    
        // Get all other articles excluding the primary one
        // Only select all non primary articles written by other authors
        $articles = Word::where("language", app()->getLocale())
            ->where('is_primary', false)
            ->where('author', "!=" , 'Marc Belderbos')
            ->select('title', 'slug', 'cover')
            ->get();
        
        // Return or pass the articles to a view
        return view("pages.guest.words.other", compact('primary', 'articles'));
    }

    public function show ($language, $slug)
    {
        // finds the article based on slug, no need to filter author or primary.
        $article = Word::where('slug', $slug)
        ->where("language", $language)
        ->select('author', 'title', 'cover', 'content')
        ->first();

        return view("pages.guest.words.show", compact("article"));
    }
}
