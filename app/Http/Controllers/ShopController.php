<?php

namespace App\Http\Controllers;

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
        $request->validate([
            'bookTitle' => 'required',
            'author' => 'required',
            'bookIntro' => 'required',
            'price' => 'required',
            'published' => 'required|date',
            'publisher' => 'required',
            'bookCover' => 'image|mimes:jpg,png,jpeg|max:5048',
        ]);

        $addNewImage = null;

        if($request->bookCover) {
            $addNewImage = time().'-'.$request->bookTitle.'.'.$request->bookCover->extension();
            $request->bookCover->move(public_path('images\architectuur\products'), $addNewImage);
        };

        Product::create([
            'title' => $request->input('bookTitle'),
            'cover' => $addNewImage,
            'about' => $request->bookIntro,
            'author' => $request->author,
            'published' => $request->published,
            'publisher' => $request->publisher,
            'price' => $request->price,
            'currency' => "EUR",
        ]);
        
        return redirect()->back();
    }

    public function showProduct($locale, $product)
    {
        $book = Product::get()
        ->where('title', '=', $product)
        ->first();

        return view('shop.book')
            ->with('product', $product)
            ->with('book', $book);
    }

    public function showPaymentForm($locale, $product)
    {
        $orderedBook = Product::get()
        ->where('title', '=', $product)
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
