<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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




    public function destroy($id)
    {
        // Temukan foto berdasarkan ID
        $foto = Foto::find($id);

        // Periksa apakah foto tersebut ada
        if (!$foto) {
            return back()->with('error', 'Foto tidak ditemukan');
        }

        // Dapatkan nama file dari model Foto
        $namaFile = $foto->nama;

        // Tentukan lokasi file
        $lokasi = public_path('curug/') . $namaFile;
        var_dump($lokasi);
        // Periksa apakah file tersebut ada
        if (file_exists($lokasi)) {
            // Hapus file dari penyimpanan
            if (Storage::disk('public')->delete('curug/' . $namaFile)) {
                // Hapus catatan Foto yang sesuai dari database
                $foto->delete();
                return back()->with('successDelete', 'Foto berhasil dihapus');
            } else {
                return back()->with('error', 'Gagal menghapus file');
            }
        } else {
            return back()->with('error', 'File tidak ditemukan');
        }
    }
}
