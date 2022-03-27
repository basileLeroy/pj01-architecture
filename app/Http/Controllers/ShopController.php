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
        $dir = public_path('.\images\architectuur\products');

        if(!is_writable($dir)){
            echo "cannot write to file";
        } else {
            echo "Can write to file";
        }
        $products = Product::all();
        return view('shop.products')->with('products', $products);
    }

    public function updateProducts(Request $request)
    {
        $request->validate([
            'bookTitle' => 'required',
            'author' => 'required',
            'bookIntro' => 'required',
            'url' => 'required|url',
            'published' => 'required|date',
            'publisher' => 'required',
            'bookCover' => 'image|mimes:jpg,png,jpeg|max:5048',
        ]);

        $dir = public_path('.\images\architectuur\products\1648373739-Test2.png');
        if(!is_writable($dir)){
            echo "cannot write to file";
        } else {
            echo "Can write to file";
        }

        $addNewImage = null;
        $filepath = '.\images\architectuur\products';

        if($request->bookCover) {

            $addNewImage = time().'-'.$request->bookTitle.'.'.$request->bookCover->extension();
            $request->bookCover->move(public_path($filepath), $addNewImage);
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
