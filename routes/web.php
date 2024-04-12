<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\WordController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;


Route::get("/", [LocaleController::class, "localeRedirect"]);

Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware(["guest", SetLocale::class])->group(function () {
    Route::get('/', [HomeController::class, "showLandingPage"])->name('welcome');

    Route::get("intentions/intentions-du-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-fr');
    Route::get("intentions/intenties-van-de-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-nl');
    Route::get("intentions/intentions-for-the-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-en');

    Route::get("intentions/intentions-de-un-projet", [StaticPageController::class, "displayIntentionsProject"])->name('intentions-project-fr');
    Route::get("intentions/intenties-van-een-project", [StaticPageController::class, "displayIntentionsProject"])->name('intentions-project-nl');
    Route::get("intentions/intentions-for-a-project", [StaticPageController::class, "displayIntentionsProject"])->name('intentions-project-en');
    
    Route::get("mots/marc-belderbos", [StaticPageController::class, "displayMarcsWords"])->name("words.marc");

    Route::get("thoughts", [StaticPageController::class, 'displayThoughts'])->name("thoughts-en");
    Route::get("gedachten", [StaticPageController::class, 'displayThoughts'])->name("thoughts-nl");
    Route::get("pensées", [StaticPageController::class, 'displayThoughts'])->name("thoughts-fr");

    Route::get("architectures", [ProjectController::class, "index"])->name("projects.index");
    Route::get("architectures/{Project}", [ProjectController::class, "show"])->name("projects.show");

    Route::get("words", [WordController::class, "index"])->name("words-en");
    Route::get("words/{Word}", [WordController::class, "show"])->name("words.show-en");
    Route::get("mots", [WordController::class, "index"])->name("words-fr");
    Route::get("mots/{Word}", [WordController::class, "show"])->name("words.show-fr");
    Route::get("woorden", [WordController::class, "index"])->name("words-nl");
    Route::get("woorden/{Word}", [WordController::class, "show"])->name("words.show-en");

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
