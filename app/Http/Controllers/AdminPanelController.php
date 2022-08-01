<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Monolog\Handler\ZendMonitorHandler;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Validation\ValidationException;

class AdminPanelController extends Controller
{
    public function login()
    {
        // $pwd = Hash::make('n60&e4KVWErv');

        return view('Admin.login');
    }

    public function checkAuth(Request $request)
    {

        $attributes = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($attributes)) {
            $title = 'landing_Article';
            $localeLanguage = App::getLocale();

            $articles = Article::where('title', '=', $title)
                ->where('language', '=', $localeLanguage)
                ->get();

            return redirect('/')->with('articles', $articles);
        };

        throw ValidationException::withMessages([
            'email' => 'This email is is not defined',
            'password' => 'Password does not match'
        ]);

        return view('Admin.login');
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
