<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    public function showContact()
    {
        $contact = Author::get()
            ->first();
        
        return view('contact')->with('contact', $contact);
    }

    public function updateContact(Request $request)
    {

        $request->validate([
            'adress' => 'required',
            'region' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required|max:255|email',
        ]);

        throw ValidationException::withMessages([
            'adress' => 'required',
            'region' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $contact = Author::get()
            ->first();

        $contact->adress = $request->adress;
        $contact->postal_code = $request->region;
        $contact->country = $request->country;
        $contact->phone = $request->phone;
        $contact->email = $request->email;

        $contact->save();
        
        return redirect()->back();
    }
}
