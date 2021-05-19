<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IntentionsController extends Controller
{
    public function showIntentionsSite()
    {
        return view('intentionsWebsite');
    }
    public function showIntentionsProject()
    {
        return view('intentionsProjects');
    }
}
