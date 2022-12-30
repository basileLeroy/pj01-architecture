<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class ShopController extends Controller
{
    public function showProducts()
    {
        $page = 'products';
        $detailPage= "products-detail";
        $localeLanguage = App::getLocale();

        $articles = Product::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->get();
        $detailArticles = Product::where('language', '=', $localeLanguage)
            ->where('page', '=', $detailPage)
            ->get();
        return view('shop.products')->with([
            'products' => $articles,
            'detailPages' => $detailArticles
        ]);
    }

    public function updateProductsPage (Request $request)
    {
        $page = "products";
        $localeLanguage = App::getLocale();

        $products = Product::where('language', '=', $localeLanguage)
            ->where('page', '=', $page)
            ->first();
        
        if($request->bookTitle) {
            $request->validate([
                'bookTitle' => 'required',
                'author' => 'required',
                'bookInfo' => 'required',
                'url' => 'required|url',
                'published' => 'required|date',
                'publisher' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg|max:5048',
            ]);

            $replacedSlashes =  str_replace("/", "", $request->bookTitle);
            $replaceDoubleSpaces = str_replace("  ", " ", $replacedSlashes);
            $replaceQuotes =  str_replace("'", "", $replaceDoubleSpaces);
            $detailTitle =  str_replace(" ", "-", $replaceQuotes);
            $languages = ["nl", "fr", "en"];
            foreach ($languages as $lang) {
                $product = new Product;
                if($lang === "nl") {
                    $product->article_content = "Er is nog geen inhoud beschikbaar.";
                } else if ($lang === "fr") {
                    $product->article_content = "Aucun contenu disponible pour le moment.";
                } else {
                    $product->article_content = "No content available yet.";
                }
                $addNewImage = null;

                $imageExists = Storage::exists($products->image);

                if($request->image) {
                    if($imageExists) {
                        Storage::delete($products->image);
                    }
                    $addNewImage = $request->file('image')->store('images/architecture/products');
                    $product->image = $addNewImage;
                };

                $product->title = $detailTitle;
                $product->language = $lang;
                $product->author = $request->author;
                $product->currency = "EUR";
                $product->publisher = $request->publisher;
                $product->published = $request->published;
                $product->url = $request->url;
                $product->page = "products-detail";
                $product->language_title = $detailTitle;
                $product->article_content = $request->bookInfo;

                $product->save();
            }
        }
        $products->article_content = $request->bookInfo;
        $products->save();
        return redirect()->back();
    }

    public function showDetailPage ($locale, $product)
    {
        $page = "products-detail";

        $products = Product::where('language', '=', $locale)
            ->where('page', '=', $page)
            ->where('title','=',$product)
            ->first();


        return view('shop.detail')
            ->with([
                'products' => $products
            ]);
    }

    public function updateDetailPage ($locale, $product, Request $request)
    {

        $languages = ["nl", "fr", "en"];

        $request->validate([
            'image' => 'mimes:jpeg,jpg,png|max:5000',
        ]);

        $localeLanguage = App::getLocale();
        $langSpecificProject = Product::where('title', '=', $product)
            ->where('language','=',$localeLanguage)
            ->first();

        foreach($languages as $lang) {
            $currentProduct = Product::where('title', '=', $product)
                ->where('language','=',$lang)
                ->first();

            $addNewImage = null;
            $coverExists = Storage::exists($currentProduct->image);

            if($request->image) {
                if($coverExists) {
                    Storage::delete($currentProduct->image);
                }
                $addNewImage = $request->file('image')->store('images/architecture/products');

                $currentProduct->image = $addNewImage;
            };
            if($request->author) {
                $currentProduct->author = $request->author;
            }
            if($request->publisher) {
                $currentProduct->publisher = $request->publisher;
            }
            if($request->url) {
                $currentProduct->url = $request->url;
            }
            if($request->published) {
                $currentProduct->published = $request->published;
            }

            $currentProduct->save();
        }

        if($request->description) {
            $langSpecificProject->article_content = $request->description;
        }
        if ($request->languageTitle){
            $langSpecificProject->language_title = $request->languageTitle;
        }

        $langSpecificProject->save();
        return redirect()->back();
    }

    public function deleteArticle ($locale, $product)
    {
        $languages = ["nl","fr","en"];
        foreach ($languages as $lang) {
            $currentProject = Product::where('title', '=', $product)
                ->where('language','=',$lang)
                ->first();
            if($currentProject->image) {
                Storage::disk('public')->delete($currentProject->image);
            }
            $currentProject->delete();
        }
        return redirect(route("shop", ['locale' => app()->getLocale()] ));
    }

    // public function showPaymentForm($locale, $product)
    // {
    //     $orderedBook = Product::where('title', '=', $product)
    //         ->first();

    //     session()->put([
    //         'Title' => $orderedBook->title,
    //         'Price' => $orderedBook->price,
    //         'Currency' => $orderedBook->currency
    //     ]);
    //     session()->save();

    //     return view('shop.payment')
    //         ->with('product', $product)
    //         ->with('book', $orderedBook);
    // }

    // public function initPayment(Request $request)
    // {
    //     $bookTitle = session('Title');
    //     $bookPrice = session('Price');
    //     $request->all();

    // }
}
