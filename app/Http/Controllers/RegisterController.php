<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class RegisterController extends Controller
{
    //Creates the register view
    public function create(){
        return view('auth.register');
    }

    public function store(){
        //Validate the user attributes
        $userAttributes = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'is_admin' => ['nullable', 'boolean'],
        ]);
        // create the user
        $user = ModelsUser::create($userAttributes);
        //login the user
        Auth::login($user);
        //dd('User ' . $user['email'] . ' created successfully.');

        return response()->json(['user' => $user], 201);
    }
}
