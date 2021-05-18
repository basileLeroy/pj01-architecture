<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntentionsController extends Controller
{
    public function showIntentionsSite()
    {
        return view('landing');
    }
    public function showIntentionsProject()
    {
        return view('landing');
    }
}
