<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Foto::latest()->paginate(9);
        return view('admin.foto', [
            'images' => $images,
            'nama'  => Auth::user()->name
        ]);
    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //define validation rules
        $data = $request->validate([
            'image'        => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kategori'     => 'required'
        ]);




        if ($request->file('image')) {
            $file = $request->file('image');
            $nama = $file->getClientOriginalName();
            $file->move(public_path('curug'), $nama);
            $data['nama'] = $nama;
        }

        // upload image

        Foto::create($data);
        return back()->with('success', "Berhasil ditambahkan");
    }




    public function destroy(Foto $foto)
    {
        // Temukan foto berdasarkan ID
        $foto = Foto::find($foto);

        if (isset($foto)) {
            $deletedFile = File::delete(public_path('curug') . "\\" . $foto->nama);
            if ($deletedFile == null) {
                $foto->delete();
                return back()->with('successDelete', 'Foto berhasil dihapus');
            } else {
                return back()->with('errorDelete', 'Gagal menghapus file');
            }
        } else {
            return back()->with('errorDelete', 'Tidak ada File di database');
        }

        // $deletedFile = File::delete(public_path('curug') . "\\" . $foto->nama);
        // if ($deletedFile == null) {
        //     $foto->delete();
        //     return redirect('foto-curug')->with('successDelete', 'Foto berhasil dihapus');
        //     // return back()->with('successDelete', 'Foto berhasil dihapus');
        // } else {
        //     return back()->with('errorDelete', 'Gagal menghapus file');
        // }

        // $deletedFile = File::delete($lokasi . "\\" . $foto->nama);

    }
}
