<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function showProducts()
    {
        $products = Product::all();
        return view('shop.products')->with('products', $products);
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

        return view('shop.payment')
            ->with('product', $product)
            ->with('book', $orderedBook);
    }
}
