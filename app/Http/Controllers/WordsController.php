<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function showWords() 
    {
        return view('words');
    }
    public function showLesLices() 
    {
        return view('words.lesLices');
    }
    public function showPurity() 
    {
        return view('words.purity');
    }
    public function showLaVerite() 
    {
        return view('words.verite');
    }
    public function showLaRaison() 
    {
        return view('words.raison');
    }
    public function showEnonciation() 
    {
        return view('words.enonciation');
    }
}
