<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index ()
    {
        $primary = Product::where("language", app()->getLocale())
            ->where("is_primary", true)
            ->first();

        $products = Product::where("is_primary", false)
            ->get();

        return view("pages.guest.products.index", compact("primary","products"));
    }

    public function show ($language, $slug)
    {

    }
}
