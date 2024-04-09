<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticPageController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, "localeRedirect"]);

Route::prefix('/{locale}')->middleware("guest")->group(function () {
    Route::get('/', [HomeController::class, "showLandingPage"])->name('welcome');

    Route::get("intentions/intentions-du-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-fr');
    Route::get("intentions/intenties-van-de-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-nl');
    Route::get("intentions/intentions-for-the-site", [StaticPageController::class, "displayWebsiteIntensions"])->name('intentions-en');


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
