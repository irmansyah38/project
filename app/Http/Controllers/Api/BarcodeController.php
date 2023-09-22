<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use App\Http\Resources\BarcodeResource;

class BarcodeController extends Controller
{


    public function index()
    {
        $barcode = Barcode::latest()->paginate(5);
        return new BarcodeResource(true, 'list data barcode', $barcode);
    }

    public function show($id)
    {
        //find post by ID
        $barcode = Barcode::find($id);

        //return single post as a resource
        return new BarcodeResource(true, 'Detail Data Post!', $barcode);
    }

    public function destroy($id)
    {

        //find post by ID
        $barcode = Barcode::find($id);

        //delete image

        //delete post
        $barcode->delete();

        //return response
        return new BarcodeResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
