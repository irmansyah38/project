<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barcode;
use Illuminate\Support\Facades\Redirect;
use App\Models\Harga;


class TransaksiController extends Controller
{
    public function index()
    {
        $data = null;
        $barcodes = [];

        if (Auth::check()) {
            $data = Auth::user();
            $barcodes = Barcode::where([
                'user_id' => $data->id,
                'status' => 'paid'
            ])->paginate(2);
        }

        return view("user.tiket", [
            "title" => "E-Tiket",
            "data" => $data,
            "barcodes" => $barcodes,
            "harga" => Harga::find(1)->harga
        ]);
    }

    public function checkout(Request $request)
    {
        // get harga
        $harga = Harga::find(1)->harga;

        // get tanggal
        $mydate = getdate(date("U"));

        $request->validate([
            'qty' => "required",
        ]);



        $request->request->add([
            'total_price' => $request->qty * $harga,
            "status" => 'unpaid',
            'tahun' => $mydate['year'],
            'bulan' => $mydate['mon'],
            'hari' => $mydate['mday'],
        ]);

        $transaksi = Transaksi::create($request->all());




        // save to barcode table
        Barcode::create([
            "id" => fake()->ean13(),
            "user_id" => (int)$transaksi->user_id,
            "order_id" => (int)$transaksi->id, // Perbarui ini dengan nilai yang sesuai
            'status' => "unpaid",
            "jumlah_orang" => (int)$transaksi->qty
        ]);

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $transaksi->id,
                'gross_amount' => $transaksi->total_price,
            ),
            'customer_details' => array(
                'first_name' => $transaksi->name,
                'name' => $transaksi->name,
                'phone' => $transaksi->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('user.checkout', compact(
            'snapToken',
            'transaksi',
            'harga'
        ));
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            echo $request->transaction_status;
            if ($request->transaction_status == 'capture') {

                $transaksi = Transaksi::find($request->order_id);
                $transaksi->update([
                    "status" => 'paid'
                ]);

                $barcode = Barcode::find($request->order_id);
                $barcode->update([
                    'status' => 'paid'
                ]);
            }
        }
    }

    public function invoice($id)
    {
        $harga = Harga::find(1)->harga;

        $transaksi = Transaksi::find($id);
        return view('user.invoice', compact('transaksi', 'harga'));
    }
}
