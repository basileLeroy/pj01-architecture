<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiographyController extends Controller
{
    public function showBio()
    {
        return view('biography');
    }
}
