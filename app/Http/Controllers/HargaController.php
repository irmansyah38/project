<?php

namespace App\Http\Controllers;

use App\Models\Harga;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HargaController extends Controller
{
    public function index()
    {
        return view('admin.harga', [
            'nama'  => Auth::user()->name,
            'harga' => Harga::find(1)
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'harga' => ['required', 'numeric',]
        ]);

        $harga = Harga::find(1);

        $harga->update($data);

        return back()->with('success', "Berhasil diubah");
    }
}
