<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArchitectureController extends Controller
{
    public function showArchitecture()
    {
        return view('architecture');
    }
}
