<?php

namespace App\Http\Controllers;

use App\Models\Barcode;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class EtiketController extends Controller
{
    public function index()
    {

        if (Auth::check()) {
            $name = Auth::user()->name;
            $id = Auth::user()->id;
            $barcodes = Barcode::where('user_id', $id)->get()->toArray();
        }

        return view("user.tiket", [
            "title" => "E-Tiket",
            "name" => $name,
            "barcodes" => $barcodes
        ]);
    }

    public function beli(Request $request)
    {
        // get from form
        $data = request()->all();

        // get user id
        $user_id = Auth::user()->id;
        $data['user_id'] = $user_id;

        // random string
        $id = fake()->randomNumber(9, true);
        $data['id'] = $id;

        Barcode::create($data);
        return redirect()->intended('/E-Tiket');
    }
}
