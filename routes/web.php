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

    Route::get('architectuur/{project}', 'App\Http\Controllers\ArchitectureController@showProject')->name('project-title', 'project');


    // Route::get('architectuur/1978-reel-boom', 'App\Http\Controllers\ArchitectureController@showReelBoom')->name('1978-reel-boom');
    // Route::get('architectuur/1979-cubus-diebach', 'App\Http\Controllers\ArchitectureController@showCubusDiebach')->name('1979-cubus-diebach');
    // Route::get('architectuur/1980-venezia-ponte-academia-1', 'App\Http\Controllers\ArchitectureController@showVeneziaPonteAcademiaOne')->name('1980-venezia-ponte-academia-1');
    // Route::get('architectuur/1980-venezia-ponte-academia-2', 'App\Http\Controllers\ArchitectureController@showVeneziaPonteAcademiaTwo')->name('1980-venezia-ponte-academia-2');
    // Route::get('architectuur/1980-villa-di-plinio-ostia', 'App\Http\Controllers\ArchitectureController@showVillaDiPlinio')->name('1980-villa-di-plinio-ostia');
    // Route::get('architectuur/1983-eupen', 'App\Http\Controllers\ArchitectureController@showEupen')->name('1983-eupen');
    // Route::get('architectuur/1987-genval', 'App\Http\Controllers\ArchitectureController@showGenval')->name('1987-genval');
    // Route::get('architectuur/1990-lovendegem', 'App\Http\Controllers\ArchitectureController@showLovendegem')->name('1990-lovendegem');
    // Route::get('architectuur/1992-astene', 'App\Http\Controllers\ArchitectureController@showAstene')->name('1992-astene');
    // Route::get('architectuur/1992-audergem', 'App\Http\Controllers\ArchitectureController@showAudergem')->name('1992-audergem');
    // Route::get('architectuur/1992-eynaten', 'App\Http\Controllers\ArchitectureController@showEynaten')->name('1992-eynaten');
    // Route::get('architectuur/1995-oudenburg', 'App\Http\Controllers\ArchitectureController@showOudenburg')->name('1995-oudenburg');
    // Route::get('architectuur/1997-gand', 'App\Http\Controllers\ArchitectureController@showGand')->name('1997-gand');
    // Route::get('architectuur/1998-herne', 'App\Http\Controllers\ArchitectureController@showHerne')->name('1998-herne');
    // Route::get('architectuur/1999-traces-romaines', 'App\Http\Controllers\ArchitectureController@showTracesRomaines')->name('1999-traces-romaines');
    // Route::get('architectuur/2000-nazareth', 'App\Http\Controllers\ArchitectureController@showNazareth')->name('2000-nazareth');
    // Route::get('architectuur/2001-genval-annex', 'App\Http\Controllers\ArchitectureController@showGenvalAnnex')->name('2001-genval-annex');
    // Route::get('architectuur/2001-genval-appartments', 'App\Http\Controllers\ArchitectureController@showGenvalAppartments')->name('2001-genval-appartments');

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

});