<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function index ()
    {
        $localeLanguage = App::getLocale();

        $products = Product::where('is_primary', false)
        ->where("language", $localeLanguage)
        ->get();

        $primary = Product::where('is_primary', true)
        ->where('language', $localeLanguage)
        ->select('description')
        ->first();
        return view("pages.guest.products.index", compact('primary', 'products'));
    }

    public function show ($language, $slug)
    {
        $product = Product::where("slug", $slug)
        ->where("language", App()->getLocale())
        ->first();

        
        return view("pages.guest.products.show")->with([
            "product" => $product
        ]);
    }

    public function create ()
    {
        $products = Product::where("language", "fr")
        ->where('is_primary', false)
        ->orderBy('index', 'ASC')
        ->get();

        $primary = Product::where('is_primary', true)
        ->select('slug','title','description', 'language')
        ->get();

        return view("pages.admin.products.create", compact('primary', 'products'));
    }

    public function store (Request $request)
    {
        $languages = ["nl", "fr", "en"];

        $request->validate([
            "title" => "required|min:3",
            "cover" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:5048",
            "link" => "required|url:http,https"
        ]);

        $slug = Str::slug($request->title);

        $cover = null;

        if($request->cover) {
            $cover = Storage::disk('public')->put('images/products/' . $slug . '/cover/', $request->cover);
        };

        $indexCount = Product::where("language", "fr")->get()->count() + 1;

        foreach ($languages as $lang) {

            if($lang === "nl") {
                $content = "<p>Er is nog geen inhoud beschikbaar.</p>";
            } else if ($lang === "fr") {
                $content = "<p>Aucun contenu disponible pour le moment.</p>";
            } else {
                $content = "<p>No content available yet.</p>";
            }

            $urlString = strval($request->link);

            Product::create([
                'is_primary' => false,
                'title' => $request->title,
                'slug' => $slug,
                'description' => $content,
                'language' => $lang,
                'cover' => "storage/" . $cover,
                'link' => $urlString,
                'index' => $indexCount
            ]);
        }

        return redirect()->route("admin.products.create");
    }

    // admin view
    public function edit ($slug)
    {
        $products = Product::where("slug", $slug)->get();

        $firstProduct = Product::where(["slug" => $slug, "language" => "fr"])->first();


        return view("pages.admin.products.edit", compact('products', 'firstProduct'));
    }

    // admin POST request (update product info article)
    public function updateIntro (Request $request)
    {

        $languages = ["nl", "fr", "en"];

        foreach ($languages as $lang) {
            if ($lang == "nl") {
                $title = $request->nl["title"];
                $content = $request->nl["content"];

            } else if ($lang == "en") {
                $title = $request->en["title"];
                $content = $request->en["content"];

            } else  {
                $title = $request->fr["title"];
                $content = $request->fr["content"];            
            }

            $isPrimary = (int)$request->is_primary;

            $productsIntro = Product::where('is_primary', true)
            ->where('slug', $request->slug)
            ->where('language', $lang)
            ->first();

            if ($productsIntro == null) {
                Product::create([
                    'is_primary' => true,
                    'title' => $title,
                    'slug' => $request->slug,
                    'description' => $content,
                    'language' => $lang,
                    'cover' => null,
                    'link' => null,
                    'index' => 0
                ]);
            } else {
                $productsIntro->description = $content;
                $productsIntro->save();
            }
        }

        return redirect()->back();

    }
    
    // admin POST request (update product)
    public function update (Request $request, $slug)
    {
        $languages = ["nl", "fr", "en"];

        $request->validate([
            "cover"=>"image|mimes:jpeg,png,jpg,gif,svg|max:5048",
            "link" => "required|url:http,https",

            "nl.title" => "required",
            "nl.content" => "required",

            "fr.title" => "required",
            "fr.content" => "required",

            "en.title" => "required",
            "en.content" => "required",
        ]);

        $cover = $request->cover ?? null;


        foreach ($languages as $lang) {
            $title = "";
            $content = "";

            if ($lang == "nl") {
                $title = $request->nl["title"];
                $content = $request->nl["content"];

            } else if ($lang == "en") {
                $title = $request->en["title"];
                $content = $request->en["content"];

            } else  {
                $title = $request->fr["title"];
                $content = $request->fr["content"];            
            }

            $product = Product::where(["slug" => $slug, "language" => $lang])->first();

            if ($title !== $product->title) {
                $product->title = $title;
            }

            if ($content !== $product->description) {
                $product->description = $content;
            }

            if ($request->link !== $product->link) {
                $product->link = $request->link;
            }

            if ($cover !== null) {
                $storagePathToCover = substr($product->cover, 8);
                if (Storage::disk("public")->exists($storagePathToCover)) {
                    Storage::disk("public")->delete($storagePathToCover);
                }

                $newCoverImage = Storage::disk('public')->put('images/products/' . $slug . '/cover/', $cover);
                $product->cover = 'storage/' . $newCoverImage;
            }
            
            $product->save();
        }

        return redirect()->back();
}

    public function delete ($slug)
    {
        $products = Product::where("slug", $slug)->get();

        $productDirectory = 'images/products/' . $slug;   
        Storage::disk("public")->deleteDirectory($productDirectory);

        foreach ($products as $product) {
            $product->delete();
        }

        return redirect()->back();
    }
    
    public function updateListOrder (Request $request)
    {
        $request->validate([
            "products" => "required|array"
        ]);

        foreach($request->products as $index => $slug) {
            $index++;
            $products = Product::where("slug", $slug)->get();
            
            foreach($products as $product) {
                $product->index = $index;
                $product->save();
            }
        };

        return redirect()->back();
    }
}
