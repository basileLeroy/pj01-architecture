<?php

use App\Http\Controllers\IntentionsController;
use Illuminate\Support\Facades\Route;

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
Route::redirect('/', '/fr');

Route::group(['prefix' => '{language}'], function () {

    Route::get('/', 'App\Http\Controllers\Controller@showLanding')->name('home');

    Route::get('intenties-van-de-site', 'App\Http\Controllers\IntentionsController@showIntentionsSite')->name('intenties-van-de-site');
    Route::get('intenties-bij-een-ontwerp', 'App\Http\Controllers\IntentionsController@showIntentionsProject')->name('intenties-bij-een-ontwerp');
    Route::get('architectuur', 'App\Http\Controllers\ArchitectureController@showArchitecture')->name('architectuur');
    Route::get('woorden', 'App\Http\Controllers\WordsController@showWords')->name('woorden');
    Route::get('marc-belderbos', 'App\Http\Controllers\AuthorController@showMarcBelderbos')->name('marc-belderbos');
    Route::get('anderen', 'App\Http\Controllers\OthersController@showOthers')->name('anderen');
    Route::get('bio', 'App\Http\Controllers\BiographyController@showBio')->name('biografie');
    Route::get('contact', 'App\Http\Controllers\ContactController@showContact')->name('contact');
    Route::get('gedachten', 'App\Http\Controllers\ThoughtsController@showthoughts')->name('gedachten');

});