<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display table of admins.
     */
    public function index (): View
    {
        $administrators = User::all();

        return view('pages.admin.accounts.index', compact('administrators'));
    }

    /**
     * Display create a new admin.
     */
    public function create (Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required|boolean'
        ]);

        if(!Auth::user()->super_admin) {
            return redirect("/401", 401);
        }


        $newAdmin = new User();

        $newAdmin->name = $request->name;
        $newAdmin->slug = Str::slug($request->name);
        $newAdmin->email = $request->email;
        $newAdmin->super_admin = (int)$request->role;
        $newAdmin->password = Hash::make($request->password);

        $newAdmin->save();

        return redirect()->back();
    }

    /**
     * Display the user's profile form.
     */
    public function edit($slug): View
    {
        return view('pages.admin.accounts.edit', [
            'user' => User::where('slug', $slug)->firstOrFail()
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update($slug, Request $request)
    {   
        $request->validate([
            'name' => 'min:1|required',
            'email' => 'min:1|email|required',
            'password' => 'confirmed',
        ]);

        $user = User::where('slug', $slug)->firstOrFail();

        if ($request->name) {
            $user->name = $request->name;

            if($user->name != $request->name) {
                $user->slug = Str::slug($request->name);
            }
        }
        if ($request->email) {
            $user->email = $request->email;
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        if(Auth::user()->super_admin) {
            $user->super_admin = $request->role;
        }

        $user->save();

        return Redirect::route('admin.profile.index')->with('status', $user->name . ' updated successfully!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy($slug): RedirectResponse
    {

        if($slug == Auth::user()->slug) {
            return redirect()->back()->with('alert', 'Not allowed to remove your current account');
        }

        $user = User::where('slug', $slug)->firstOrFail();

        $user->delete();

        return redirect()->back()->with('status', Auth::user()->name . ' Has been successfully deleted');
    }
}
