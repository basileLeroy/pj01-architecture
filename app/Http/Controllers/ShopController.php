<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showProducts()
    {
        $products = Product::all();
        return view('shop.products')->with('products', $products);
    }

    public function updateProducts(Request $request)
    {
//        ddd($request->file("bookCover"));
        $request->validate([
            'bookTitle' => 'required',
            'author' => 'required',
            'bookIntro' => 'required',
            'url' => 'required|url',
            'published' => 'required|date',
            'publisher' => 'required',
            'bookCover' => 'image|mimes:jpg,png,jpeg|max:5048',
        ]);

        $addNewImage = null;

        if($request->bookCover) {
            $addNewImage = $request->file('bookCover')->store('images/architecture/products');
        };

        Product::create([
            'title' => $request->input('bookTitle'),
            'cover' => $addNewImage,
            'about' => $request->bookIntro,
            'author' => $request->author,
            'published' => $request->published,
            'publisher' => $request->publisher,
            'url' => $request->url,
            'currency' => "EUR",
        ]);

        return redirect()->back();
    }

    public function showProduct($locale, $product)
    {
        $book = Product::where('title', '=', $product)
            ->first();
        $contact = Author::first();

        return view('shop.book')
            ->with('product', $product)
            ->with('book', $book)
            ->with('contact', $contact);
    }

    public function showPaymentForm($locale, $product)
    {
        $orderedBook = Product::where('title', '=', $product)
            ->first();

        session()->put([
            'Title' => $orderedBook->title,
            'Price' => $orderedBook->price,
            'Currency' => $orderedBook->currency
        ]);
        session()->save();

        return view('shop.payment')
            ->with('product', $product)
            ->with('book', $orderedBook);
    }

    public function initPayment(Request $request)
    {
        $bookTitle = session('Title');
        $bookPrice = session('Price');
        $request->all();

    }
}
