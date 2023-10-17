<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
        return view('admin.contact', [
            'title' => "Contact",
            "nama" => Auth::user()->name,
            'contacts' => Contact::all()
        ]);
    }

    public function store(Request $request){
        
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::create($data);
    
        // return back()->with('success', "Berhasil dikirim ke admin");
    }

    public function detail($id){
        $contact = Contact::find($id);
        return view('admin.detail-contact', [
            "nama" => Auth::user()->name,
            'contact' => $contact
        ]);
    }

    public function destroy($id){
        Contact::destroy($id);
        return back()->with('success', "Berhasil dihapus");
    }
}
