<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Monolog\Handler\ZendMonitorHandler;
use App\Models\Admin;

class AdminPanelController extends Controller
{
    public function login()
    {
        // $pwd = Hash::make('n60&e4KVWErv');
        
        return view('Admin.login');
    }

    public function checkAuth(Request $request)
    {

        $request->validate([
            'email' => 'required|max:255|email:rfc,dns',
            'password' => 'required',
        ]);

        $admin = Admin::all();
        dd($admin);
        $adminName = $request->input('email');
        $adminPwd = $request->input('password');



        return view('Admin.login');
    }
}
