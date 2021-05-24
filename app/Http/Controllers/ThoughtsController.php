<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThoughtsController extends Controller
{
    public function showThoughts()
    {
        return view('thoughts');
    }
}
