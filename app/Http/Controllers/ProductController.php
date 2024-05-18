<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class ProductController extends Controller
{
    public function index ()
    {
        $page = 'Products';
        $localeLanguage = App::getLocale();
        $params = ['page' => $page, 'language' => $localeLanguage];

        $article = Product::where("language", app()->getLocale())
            ->where($params)
            ->first();

        return view("pages.guest.products.index", compact("article"));
    }

    public function show ($language, $slug)
    {

    }

    public function edit ()
    {
        $articles = Product::where("page", "Products")->get();

        return view('pages.admin.products.edit', compact("articles"));
    }

    public function update (Request $request)
    {
        $request->validate([
            'fr.*' => 'required|min:3',
            'en.*' => 'required|min:3',
            'nl.*' => 'required|min:3',
        ]);

        if($request->no_article) {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                Product::create([
                    "is_primary" => 1,
                    "title" => "Products",
                    "slug" => "products",
                    "content" => $content["content"],
                    "language" => $language,
                    "page" => "Products",
                ]);
            }
        } else {
            foreach (["fr" => $request->fr, "en" => $request->en, "nl" => $request->nl] as $language => $content) {
                $product = Product::where(["language"=>$language, "page"=>"Products"])->first();
                $product->content = $content["content"];
                $product->save();
            }
        }

        return redirect()->back();
    }
}
