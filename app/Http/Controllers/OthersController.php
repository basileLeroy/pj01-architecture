<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class OthersController extends Controller
{
    public function showOthers()
    {
        $page = 'others';
        $detailPage= "others-detail";
        $localeLanguage = App::getLocale();

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->get();

        $detailArticles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $detailPage)
            ->get();

        return view('others')->with([
            'articles' => $articles,
            'detailPages' => $detailArticles
        ]);
    }

    public function updateOthers(Request $request)
    {
        $page = 'others';
        $localeLanguage = App::getLocale();
        $noContentMessage = "";
        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        if($request->newArticle) {

            $detailTitle =  str_replace(" ", "-", $request->newArticle);

            if($localeLanguage === "nl") {
                $noContentMessage = "Er is nog geen inhoud beschikbaar.";
            } else if ($localeLanguage === "fr") {
                $noContentMessage = "Aucun contenu disponible pour le moment.";
            } else {
                $noContentMessage = "No content available yet.";
            }
            Article::create([
                'title' => $detailTitle,
                'article_content' => $noContentMessage,
                'language' => $localeLanguage,
                'page' => "others-detail"
            ]);
        };
        $articles->article_content = $request->description;
        $articles->save();
        return redirect()->back();
    }
}
