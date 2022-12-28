<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class WordsController extends Controller
{
    public function showWords()
    {
        $page = 'words';
        $detailPage= "words-detail";
        $localeLanguage = App::getLocale();

        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->get();
        $detailArticles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $detailPage)
            ->get();
        return view('words.words')->with([
            'articles' => $articles,
            'detailPages' => $detailArticles
        ]);
    }

    public function showDetailPage($locale, $article)
    {
        $page = "words-detail";

        $articles = Article::where('language', '=', $locale)
            ->where('page', '=', $page)
            ->where('title','=',$article)
            ->first();


        return view('words.detail')
            ->with([
                'articles' => $articles
            ]);
    }

    public function updatewords(Request $request)
    {
        $page = 'words';
        $localeLanguage = App::getLocale();
        $noContentMessage = "";
        $articles = Article::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();

        if($request->newArticle) {

            $request->validate([
                'image' => 'image|mimes:jpg,png,jpeg|max:5048',
            ]);

            $replacedSlashes =  str_replace("/", "", $request->newArticle);
            $replaceDoubleSpaces = str_replace("  ", " ", $replacedSlashes);
            $replaceQuotes =  str_replace("'", "", $replaceDoubleSpaces);
            $detailTitle =  str_replace(" ", "-", $replaceQuotes);
            $languages = ["nl", "fr", "en"];
            foreach ($languages as $lang) {
                $article = new Article;
                if($lang === "nl") {
                    $article->article_content = "Er is nog geen inhoud beschikbaar.";
                } else if ($lang === "fr") {
                    $article->article_content = "Aucun contenu disponible pour le moment.";
                } else {
                    $article->article_content = "No content available yet.";
                }
                $addNewImage = null;

                $imageExists = Storage::exists($articles->image);

                if($request->image) {
                    if($imageExists) {
                        Storage::delete($articles->image);
                    }
                    $addNewImage = $request->file('image')->store('images/architecture/articles');
                    $article->image = $addNewImage;
                };

                $article->title = $detailTitle;
                $article->language = $lang;
                $article->page = "words-detail";
                $article->language_title = $request->newArticle;

                $article->save();
            }
        };

        $articles->article_content = $request->description;
        $articles->save();
        return redirect()->back();
    }

    public function updateDetailPage ($locale, $project, Request $request)
    {

        $languages = ["nl", "fr", "en"];
//        ddd($locale, $project, $request);

        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg|max:5048',
            'articleImage' => 'image|mimes:jpg,png,jpeg|max:5048',
        ]);

        foreach($languages as $lang) {
            $currentProject = Article::where('title', '=', $project)
                ->where('language','=',$lang)
                ->first();

            $addNewImage = null;

            $coverExists = Storage::exists($currentProject->image);
            $imageExists = Storage::exists($currentProject->article_image);

            if($request->image) {
                if($coverExists) {
                    Storage::delete($currentProject->image);
                }
                $addNewImage = $request->file('image')->store('images/architecture/words/icons');

                $currentProject->image = $addNewImage;
            };

            if($request->languageTitle) {
                if($lang === App::getLocale()) {

                    $currentProject->language_title = $request->languageTitle;
                }
            }
            if($request->articleImage) {
                if($imageExists) {
                    Storage::delete($currentProject->article_image);
                }
                $addNewImage = $request->file('articleImage')->store('images/architecture/words/images');

                $currentProject->article_image = $addNewImage;
            };

            $currentProject->save();
        }

        if($request->description) {
            $localeLanguage = App::getLocale();
            $langSpecificProject = Article::where('title', '=', $project)
                ->where('language','=',$localeLanguage)
                ->first();
            $langSpecificProject->article_content = $request->description;

            $langSpecificProject->save();
        }
        return redirect()->back();
    }

    public function deleteArticle ($locale, $article)
    {
        $languages = ["nl","fr","en"];
        foreach ($languages as $lang) {
            $currentProject = Article::where('title', '=', $article)
                ->where('language','=',$lang)
                ->first();
            if($currentProject->image) {
                Storage::disk('public')->delete($currentProject->image);
            }
            if($currentProject->article_image){
                Storage::disk('public')->delete($currentProject->article_image);
            }
            $currentProject->delete();
        }
        return redirect(route("woorden", ['locale' => app()->getLocale()] ));
    }
}