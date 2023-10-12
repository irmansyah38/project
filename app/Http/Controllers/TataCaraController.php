<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TataCaraController extends Controller
{

    public function index()
    {
        return view('user.tata-cara-pembayaran', [
            'title' => 'Tata Cara Pembayaran'
        ]);
    }
}
