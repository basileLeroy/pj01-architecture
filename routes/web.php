<?php

use App\Http\Controllers\IntentionsController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MollieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\Controller@localeRedirect');

Route::prefix('/{locale}')->group(function () {

    Route::get('/', 'App\Http\Controllers\Controller@showLanding')->name('home');
    Route::post('/', 'App\Http\Controllers\Controller@updateArticle')->name('home')->middleware('auth');

    Route::get('intenties-van-de-site', 'App\Http\Controllers\IntentionsController@showIntentionsSite')->name('intenties-van-de-site');
    Route::post('intenties-van-de-site', 'App\Http\Controllers\IntentionsController@updateIntentionsSite')->name('intenties-van-de-site')->middleware('auth');
    Route::get('intenties-bij-een-ontwerp', 'App\Http\Controllers\IntentionsController@showIntentionsProject')->name('intenties-bij-een-ontwerp');
    Route::post('intenties-bij-een-ontwerp', 'App\Http\Controllers\IntentionsController@updateIntentionsProject')->name('intenties-bij-een-ontwerp')->middleware('auth');

    Route::get('architectuur', 'App\Http\Controllers\ArchitectureController@showArchitecture')->name('architectuur');
    Route::post('architectuur', 'App\Http\Controllers\ArchitectureController@addProject')->name('architectuur')->middleware('auth');


    Route::get('architectuur/{project}', 'App\Http\Controllers\ArchitectureController@showProject')->name('project-title', 'project');
    Route::post('update-project/{project}', 'App\Http\Controllers\ArchitectureController@updateProject')->name('updateProject')->middleware('auth');
    Route::get('delete-project/{project}', 'App\Http\Controllers\ArchitectureController@deleteProject')->name("deleteProject")->middleware('auth');


    Route::get('woorden', 'App\Http\Controllers\WordsController@showWords')->name('woorden');
    Route::post('woorden', 'App\Http\Controllers\WordsController@showIntro')->name('woorden')->middleware('auth');

    Route::get('woorden/{words}', 'App\Http\Controllers\WordsController@showLink')->name('words-title', 'words');
    Route::post('woorden/{words}', 'App\Http\Controllers\WordsController@updateArticle')->name('words-title', 'words')->middleware('auth');

    // Route::get('marc-belderbos', 'App\Http\Controllers\AuthorController@showMarcBelderbos')->name('marc-belderbos');
    Route::get('anderen', 'App\Http\Controllers\OthersController@showOthers')->name('anderen');
    Route::get('anderen/{article}', 'App\Http\Controllers\OthersController@showDetailPage')->name('otherPages');
    Route::post('update-others', 'App\Http\Controllers\OthersController@updateOthers')->name('updateOthers')->middleware('auth');
    Route::post('update-detail-page', 'App\Http\Controllers\OthersController@updateDetailPage')->name('updateDetailPage')->middleware('auth');
    Route::get('bio', 'App\Http\Controllers\BiographyController@showBio')->name('biografie');
    Route::post('bio', 'App\Http\Controllers\BiographyController@updateBio')->name('biografie')->middleware('auth');
    Route::get('contact', 'App\Http\Controllers\ContactController@showContact')->name('contact');
    Route::post('contact', 'App\Http\Controllers\ContactController@updateContact')->name('contact')->middleware('auth');
    Route::get('gedachten', 'App\Http\Controllers\ThoughtsController@showthoughts')->name('gedachten');
    Route::post('gedachten', 'App\Http\Controllers\ThoughtsController@updateThoughts')->name('gedachten')->middleware('auth');

    Route::get('products', 'App\Http\Controllers\ShopController@showProducts')->name('shop');
    Route::post('products', 'App\Http\Controllers\ShopController@updateProducts')->name('shop')->middleware('auth');
    Route::get('products/{product}', 'App\Http\Controllers\ShopController@showProduct')->name('product-title', 'product');

    Route::get('order/{product}', 'App\Http\Controllers\ShopController@showPaymentForm')->name('order-product', 'product');
    Route::post('order/initialise', 'App\Http\Controllers\ShopController@initPayment')->name('initPayment');

    Route::post('mollie-payment',[MollieController::Class,'preparePayment'])->name('mollie.payment');
    Route::get('payment-success',[MollieController::Class, 'paymentSuccess'])->name('payment.success');
    Route::get('product-transaction',[MollieController::Class, 'checkTransaction'])->name('payment.check');

    Route::get('admin-dashboard', 'App\Http\Controllers\AdminPanelController@login')->middleware('auth');

    Route::get('/admin/login', 'App\Http\Controllers\AdminPanelController@login')->name('login')->middleware('guest');
    Route::get('admin-dashboard', 'App\Http\Controllers\AdminPanelController@logout')->name('logout')->middleware('auth');
    Route::post('admin/dashboard', 'App\Http\Controllers\AdminPanelController@checkAuth')->name('checkAuth');

    Route::get('intercept/order-sent/order-id/{orderId}', [MollieController::Class, 'sendPackageMail'])->name('confirmation', 'orderId');
});
