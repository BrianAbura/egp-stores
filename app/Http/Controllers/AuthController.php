<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(){
        return view('welcome');
    }

    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

    if(Auth::attempt($credentials)){
        return redirect('home')->with('success', 'Welcome to your account.');
    }

        return back()->with('error', 'Invalid Email Address or Password');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
