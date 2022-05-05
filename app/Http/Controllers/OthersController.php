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
