<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

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

    public function ForgotPasswordPost(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status_ok' => __($status)])
                    : back()->withErrors(['status_error' => __($status)]);
    }

    public function ResetPasswordPost(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed'
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status_ok', __($status))
        : back()->withErrors(['email' => [__($status)]]);
    }
}
