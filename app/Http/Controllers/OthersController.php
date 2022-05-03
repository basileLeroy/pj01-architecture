<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class OthersController extends Controller
{
    public function showOthers()
    {
        $page = 'others';
        $localeLanguage = App::getLocale();

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->get();

        return view('others')->with([
            'articles' => $articles]);
    }

    public function updateOthers(Request $request)
    {
        $page = 'others';
        $localeLanguage = App::getLocale();
        $articleContent = $request->description;

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        $articles->article_content = $articleContent;

        $articles->save();

        return redirect()->back();
    }
}
