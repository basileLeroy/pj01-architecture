<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\WordController;
use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;

/**
 * Setting up a list of public routes.
 * These routes will be available to both authenticated and guest users.
 */

$publicRoutes = function () {
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
};

Route::get("/", [LocaleController::class, "localeRedirect"]);

Route::prefix('{locale}')->where(['locale' => '[a-zA-Z]{2}'])->middleware([SetLocale::class])->group(function () use ($publicRoutes) {
    $publicRoutes();

    Route::get("admin/login", function () {
        return redirect('/admin/login');
    });
});

Route::middleware(["auth"])->group(function () {

    Route::get('admin/dashboard', [DashboardController::class, "index"])->name("admin.dashboard");
    
    Route::get('home/edit', [HomeController::class, "edit"])->name("admin.home.edit");
    Route::post('home/update', [HomeController::class, "update"])->name("admin.home.update");

    Route::get("intentions/intentions-du-site/edit", [StaticPageController::class, "editWebsiteIntensions"])->name('admin.intentions-website.edit');
    Route::post("intentions/intentions-du-site/update", [StaticPageController::class, "updateWebsiteIntensions"])->name('admin.intentions-website.update');
    
    Route::get("intentions/intentions-de-un-projet/edit", [StaticPageController::class, "editProjectIntensions"])->name('admin.intentions-project.edit');
    Route::post("intentions/intentions-de-un-projet/update", [StaticPageController::class, "updateProjectIntensions"])->name('admin.intentions-project.update');

    Route::get("architecturer/create", [ProjectController::class, "create"])->name("admin.projects.create");
    Route::post("architecturer/store", [ProjectController::class, "store"])->name("admin.projects.store");
    Route::post("architecturer/update-order", [ProjectController::class, "updateListOrder"])->name("admin.projects.update-order");
    Route::get("architecturer/{Project}/edit", [ProjectController::class, "edit"])->name("admin.projects.edit");
    Route::post("architecturer/{Project}/update", [ProjectController::class, "update"])->name("admin.projects.update");

    Route::get("mots/marc-belderbos/edit", [WordController::class, "edit"])->name("admin.words.marc.edit");
    Route::Post("mots/marc-belderbos/update", [WordController::class, "update"])->name("admin.words.marc.update");
    Route::Post("mots/marc-belderbos/store", [WordController::class, "store"])->name("admin.words.marc.store");
    Route::Post("mots/marc-belderbos/update-order", [WordController::class, "updateListOrder"])->name("admin.words.marc.update-order");
    Route::get("mots/marc-belderbos/{Word}/edit", [WordController::class, "editDetail"])->name("admin.words.marc.editDetail");

    Route::get("mots/others/edit", [WordController::class, "editOtherArticles"])->name("admin.words.others.edit");
    Route::Post("mots/others/update", [WordController::class, "updateOtherArticles"])->name("admin.words.others.update");
    Route::Post("mots/others/store", [WordController::class, "storeOtherArticles"])->name("admin.words.others.store");
    Route::Post("mots/others/update-order", [WordController::class, "updateListOrder"])->name("admin.words.others.update-order");
    Route::get("mots/others/{Word}/edit", [WordController::class, "editOtherDetailArticles"])->name("admin.words.others.editDetail");
    
    Route::get("preview/static-page", [StaticPageController::class, "displayStaticPreview"])->name("preview.static-page");

    Route::get('admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
