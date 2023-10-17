<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


class LoginContoller extends Controller
{
    public function index()
    {
        return view('user.login', [
            'title' => 'login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role == 'A') {
                return redirect()->intended('/admin');
            } elseif ($user->role == 'U') {
                return redirect()->intended('/');
            }
        }

        return back()->with('loginError', "login failed!");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
