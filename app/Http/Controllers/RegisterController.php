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
            'email' => ['required', 'email:dns', 'unique:users'],
            'nomor' => ['numeric', 'required', 'unique:users', 'min_digits:10', 'max_digits:13'],
            'password' => ['required', 'min:8', 'confirmed']
        ], [
            'name.required' => 'Nama harus diisi.',
            'user_name.required' => 'Nama pengguna harus diisi.',
            'user_name.unique' => 'Nama pengguna sudah digunakan.',
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Alamat email tidak valid.',
            'email.unique' => 'Alamat email sudah digunakan.',
            'nomor.required' => 'Nomor harus diisi.',
            'nomor.numeric' => 'Nomor harus berupa angka.',
            'nomor.unique' => 'Nomor sudah digunakan.',
            'nomor.min_digits' => 'Nomor harus memiliki setidaknya 10 digit.',
            'nomor.max_digits' => 'Nomor tidak boleh lebih dari 13 digit.',
            'password.required' => 'Kata sandi harus diisi.',
            'password.min' => 'Kata sandi harus setidaknya 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.'
        ]);

        $data['role'] = 'U';

        User::create($data);
        return back()->with('signUpComplete', "Berhasil membuat akun!");
    }
}
