<?php

use App\Http\Controllers\IntentionsController;
use GuzzleHttp\Middleware;
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
Route::redirect('/', '/nl');


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

    Route::get('woorden', 'App\Http\Controllers\WordsController@showWords')->name('woorden');
    
    Route::get('woorden/{words}', 'App\Http\Controllers\WordsController@showLink')->name('words-title', 'words');

    // Route::get('marc-belderbos', 'App\Http\Controllers\AuthorController@showMarcBelderbos')->name('marc-belderbos');
    Route::get('anderen', 'App\Http\Controllers\OthersController@showOthers')->name('anderen');
    Route::get('bio', 'App\Http\Controllers\BiographyController@showBio')->name('biografie');
    Route::get('contact', 'App\Http\Controllers\ContactController@showContact')->name('contact');
    Route::get('gedachten', 'App\Http\Controllers\ThoughtsController@showthoughts')->name('gedachten');

    Route::get('admin-dashboard', 'App\Http\Controllers\AdminPanelController@login')->middleware('auth');
    
    Route::get('/admin/login', 'App\Http\Controllers\AdminPanelController@login')->name('login')->middleware('guest');
    Route::get('admin-dashboard', 'App\Http\Controllers\AdminPanelController@logout')->name('logout')->middleware('auth');
    Route::post('admin/dashboard', 'App\Http\Controllers\AdminPanelController@checkAuth')->name('checkAuth');
});
