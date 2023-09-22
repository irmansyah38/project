<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.sign-up', [
            'title' => 'Sign Up'
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'user_name' => 'required|unique:users|max:255',
            'email' => ['required', 'email', 'unique:users'],
            'nomor' => ['numeric', 'required', 'unique:users', 'min_digits:10', 'max_digits:13'],
            'password' => ['required', 'min:5', 'max:20']
        ]);
        $data['role'] = 'U';

        User::create($data);
        return redirect()->intended('/login');
    }
}
