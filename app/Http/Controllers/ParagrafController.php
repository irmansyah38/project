<?php

namespace App\Http\Controllers;

use App\Models\Paragraf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;


class ParagrafController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('admin.paragraf', [
            'nama' => Auth::user()->name,
            'paragrafs' => Paragraf::all()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    public function edit($id)
    {
        return view('admin.paragraf-edit', [
            'nama' => Auth::user()->name,
            'paragraf' => Paragraf::find($id)

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'paragraf' => 'required',
            'id' => 'required'
        ]);

        $id = (int) $data['id'];

        $Paragraf = Paragraf::find($id);

        $Paragraf->update([
            'paragraf' => $data['paragraf']
        ]);

        return back()->with('success', "Berhasil diubah");
    }
}
