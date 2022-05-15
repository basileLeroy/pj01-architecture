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

    public function showDetailPage($locale, $article)
    {

        $page = "others-detail";

        $articles = Article::where('language', '=', $locale)
            ->where('page', '=', $page)
            ->first();


        return view('others.detailPage')
            ->with([
                'articles' => $articles
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
            $languages = ["nl", "fr", "en"];
            foreach ($languages as $lang) {

                if($lang === "nl") {
                    $noContentMessage = "Er is nog geen inhoud beschikbaar.";
                } else if ($lang === "fr") {
                    $noContentMessage = "Aucun contenu disponible pour le moment.";
                } else {
                    $noContentMessage = "No content available yet.";
                }
                Article::create([
                    'title' => $detailTitle,
                    'article_content' => $noContentMessage,
                    'language' => $lang,
                    'page' => "others-detail"
                ]);
            }
        };
        $articles->article_content = $request->description;
        $articles->save();
        return redirect()->back();
    }

    public function updateDetailPage (Request $request)
    {
        $page = 'others-detail';
        $localeLanguage = App::getLocale();
        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();
//        dd($localeLanguage, $articles, $request);
        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:5048',
        ]);

        $addNewImage = null;

        $imageExists = Storage::exists($articles->image);


        if($request->image) {
            if($imageExists) {
                Storage::delete($articles->image);
            }
            $addNewImage = $request->file('image')->store('images/architecture/articles');

            $articles->image = $addNewImage;
        };
        $articles->article_content = $request->description;
        $articles->save();
        return redirect()->back();
    }
}
