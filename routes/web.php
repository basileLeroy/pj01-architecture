<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\WordController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;


Route::get("/", [LocaleController::class, "localeRedirect"]);

Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware(["guest", SetLocale::class])->group(function () {
    /**
     * 
     * Static routes
     * => for each route, there is a unique url based on the current locale
     * 
     */

    Route::get('/', [HomeController::class, "showLandingPage"])->name('welcome');

    Route::get("intentions/intentions-du-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-fr');
    Route::get("intentions/intenties-van-de-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-nl');
    Route::get("intentions/intentions-for-the-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-en');

    Route::get("intentions/intentions-de-un-projet", [StaticPageController::class, "displayIntentionsProject"])->name('intentions-project-fr');
    Route::get("intentions/intenties-van-een-project", [StaticPageController::class, "displayIntentionsProject"])->name('intentions-project-nl');
    Route::get("intentions/intentions-for-a-project", [StaticPageController::class, "displayIntentionsProject"])->name('intentions-project-en');

    Route::get("designer/biography", [StaticPageController::class, "displayBiography"])->name('biography-en');
    Route::get("concepteur/biographie", [StaticPageController::class, "displayBiography"])->name('biography-fr');
    Route::get("ontwerper/biografie", [StaticPageController::class, "displayBiography"])->name('biography-nl');

    Route::get("designer/contact", [StaticPageController::class, "displayContact"])->name('contact-en');
    Route::get("concepteur/contact", [StaticPageController::class, "displayContact"])->name('contact-fr');
    Route::get("ontwerper/contact", [StaticPageController::class, "displayContact"])->name('contact-nl');
    
    Route::get("thoughts", [StaticPageController::class, 'displayThoughts'])->name("thoughts-en");
    Route::get("gedachten", [StaticPageController::class, 'displayThoughts'])->name("thoughts-nl");
    Route::get("pensées", [StaticPageController::class, 'displayThoughts'])->name("thoughts-fr");

    /**
     * 
     * Dynamic routes
     * => for each route, there is a unique url based on the current locale
     * 
     */

    // Routes for projects made By Marc
    Route::get("architectures", [ProjectController::class, "index"])->name("projects.index");
    Route::get("architectures/{Project}", [ProjectController::class, "show"])->name("projects.show");

    // Routes for articles written by Marc and others
    Route::get("words", [WordController::class, "index"])->name("words-en");
    Route::get("words/other", [WordController::class, "other"])->name("words.other-en");
    Route::get("words/{Word}", [WordController::class, "show"])->name("words.show-en");
    
    Route::get("mots", [WordController::class, "index"])->name("words-fr");
    Route::get("mots/autres", [WordController::class, "other"])->name("words.other-fr");
    Route::get("mots/{Word}", [WordController::class, "show"])->name("words.show-fr");
    
    Route::get("woorden", [WordController::class, "index"])->name("words-nl");
    Route::get("woorden/andere", [WordController::class, "other"])->name("words.other-nl");
    Route::get("woorden/{Word}", [WordController::class, "show"])->name("words.show-nl");

    // Routes for books on display written by Marc
    Route::get("publisher", [ProductController::class, "index"])->name("products.index-en");
    Route::get("publisher/{Product}", [ProductController::class, "show"])->name("products.show-en");

    Route::get("edition", [ProductController::class, "index"])->name("products.index-fr");
    Route::get("edition/{Product}", [ProductController::class, "show"])->name("products.show-fr");

    Route::get("edities", [ProductController::class, "index"])->name("products.index-nl");
    Route::get("edities/{Product}", [ProductController::class, "show"])->name("products.show-nl");
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
