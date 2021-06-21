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

    Route::get('intenties-van-de-site', 'App\Http\Controllers\IntentionsController@showIntentionsSite')->name('intenties-van-de-site');
    Route::get('intenties-bij-een-ontwerp', 'App\Http\Controllers\IntentionsController@showIntentionsProject')->name('intenties-bij-een-ontwerp');
    Route::get('architectuur', 'App\Http\Controllers\ArchitectureController@showArchitecture')->name('architectuur');
    Route::post('architectuur', 'App\Http\Controllers\ArchitectureController@addProject')->name('architectuur')->middleware('auth');
    Route::get('architectuur/admin/edit', 'App\Http\Controllers\ArchitectureController@update')->name('update-projects');

    Route::get('architectuur/{project}', 'App\Http\Controllers\ArchitectureController@showProject')->name('project-title', 'project');

    Route::get('woorden', 'App\Http\Controllers\WordsController@showWords')->name('woorden');
    
    Route::get('woorden/les-lices-de-lactualite-2003', 'App\Http\Controllers\WordsController@showLesLices')->name('les-lices-de-lactualite-2003');
    Route::get('woorden/purity-lies-in-the-incompletion-1997', 'App\Http\Controllers\WordsController@showPurity')->name('purity-lies-in-the-incompletion-1997');
    Route::get('woorden/la-verite-est-oblique-1993', 'App\Http\Controllers\WordsController@showLaVerite')->name('la-verite-est-oblique-1993');
    Route::get('woorden/la-raison-de-laugure-1992', 'App\Http\Controllers\WordsController@showLaRaison')->name('la-raison-de-laugure-1992');
    Route::get('woorden/enonciation-dangoisse-et-dinnocence-1978', 'App\Http\Controllers\WordsController@showEnonciation')->name('enonciation-dangoisse-et-dinnocence-1978');

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
