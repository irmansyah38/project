<?php

namespace App\Http\Controllers;

use App\Models\FAQ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.faq', [
            "nama" => Auth::user()->name,
            'faqs' => FAQ::all()->toArray()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.new-faq', [
            'nama' => Auth::user()->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        FAQ::create($data);
        return redirect()->route('admin.faq')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit($id)
    {
        return view('admin.edit-faq', [
            'nama' => Auth::user()->name,
            'faq' => FAQ::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        FAQ::find($request->id)->update($data);
        return redirect()->route('admin.faq')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);


        //delete post
        $faq->delete();

        //redirect to index
        return redirect()->back()->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
