<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //Create login view
    public function create(){
        return view('auth.login');
    }


    public function store(){
        $validatedAttributes =request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if (! Auth::attempt($validatedAttributes))
        {
            throw ValidationException::withMessages([
                'email'=>'The provided credentials do not match our records.',
            ]);
        }
        //regenerate session token
        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy(Request $request){

        Auth::logout();

        // Invalidate and regenerate the session token for security
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
