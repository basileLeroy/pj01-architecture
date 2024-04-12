<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index ()
    {
        // Get Primary article for the index page
        $primary = Word::where("language", app()->getLocale())
            ->where('is_primary', true)
            ->select('author','content')
            ->first();

        // Get all other articles excluding the primary one
        // This assumes that there can only be one primary article
        $articles = Word::where("language", app()->getLocale())
            ->where('is_primary', false)
            ->select('title', 'slug', 'cover')
            ->get();
        
        // Return or pass the articles to a view
        return view("pages.guest.words.index", compact('primary', 'articles'));
    }

    public function show ($slug)
    {

    }
}
