<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * This is a tricky controller.
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
