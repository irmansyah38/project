<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Barcode;
use Illuminate\Support\Facades\Http;
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
        // validation
        $request->validate([
            'qty' => "required",
        ]);

         // get tanggal
         $mydate = getdate(date("U"));

         // get harga
        $harga = Harga::find(1)->harga;

         // Informasi Tripay
        $apiKey = config('tripay.api_key');
        $merchantCode = config('tripay.merchant_code');
        $privateKey = config('tripay.private_key');

        // amount
        $amount = $harga * $request->qty;

        // make order_id
        $order_id =$request->user_id . "-" . date('Y-m-d-H:i:s');

        // Membuat signature
        $signature = hash_hmac('sha256', $merchantCode . $order_id . $amount, $privateKey);

        $dataTransaksi = [

            'name' => $request->name,
            'user_id' => $request->user_id,
            'order_id' => $order_id,
            'qty' => $request->qty,
            'total_price' => $amount,
            "status" => 'unpaid',
            'phone' => $request->phone,
            'tahun' => $mydate['year'],
            'bulan' => $mydate['mon'],
            'hari' => $mydate['mday'],
        ];

        $transaksi = Transaksi::create($dataTransaksi);

        // save to barcode table
        Barcode::create([
            "id" => fake()->ean13(),
            "user_id" => $transaksi->user_id,
            "order_id" => $transaksi->order_id,
            'status' => "unpaid",
            "jumlah_orang" => $transaksi->qty
        ]);

        $data = [
            'method' => 'Qris',
            'merchant_ref' => $order_id,
            'amount' => $amount,
            'customer_name' => $request->name,
            "customer_email" => $request->email,
            'order_items' => [
                [
                    "name" => "Tiket Curug Cikoneng",
                    "price" => $harga,
                    "quantity" => $request->qty
                ]
            ],
            'signature' => $signature, // Menambahkan signature ke data
        ];

        // Permintaan ke Tripay
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
        ])->post(config('tripay.api_url') . '/transaction/create', $data);

        if ($response->successful()) {

            return view("user.checkout",[
                'qr' => $response["data"]['qr_url'],
                'harga' => $harga,
                'transaksi' => $transaksi
            ]);
        }
        else{
            return redirect()->back()->with('error','gagal pembayaran');
        }

    }

    public function callback(Request $request)
    {
        // $serverKey = config('midtrans.server_key');
        // $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        // if ($hashed == $request->signature_key) {
        //     echo $request->transaction_status;
        //     if ($request->transaction_status == 'capture' or $request->transactionStatus == 'settlement') {

        //         $getIdTransaksi = Transaksi::where("order_id", $request->order_id)->get()->toArray();
        //         $transaksi = Transaksi::find($getIdTransaksi[0]["id"]);
        //         $transaksi->update([
        //             "status" => 'paid'
        //         ]);

        //         $getIdBarcode = Barcode::where('order_id', $request->order_id)->get()->toArray();
        //         $barcode = Barcode::find($getIdBarcode[0]['id']);
        //         $barcode->update([
        //             'status' => 'paid'
        //         ]);
        //     }
        // }
         // Mendapatkan data callback dari Tripay
         $callbackData = $request->all();

         if($callbackData['status'] === "PAID"){
            // $data = Pembayaran::find($callbackData["merchant_ref"]);
            // $data->update([
            //      'status' => 'paid'
            //  ]);

            $getIdTransaksi = Transaksi::where("order_id", $callbackData["merchant_ref"])->get()->toArray();
            $transaksi = Transaksi::find($getIdTransaksi[0]["id"]);
            $transaksi->update([
                "status" => 'paid'
            ]);

            $getIdBarcode = Barcode::where('order_id', $callbackData["merchant_ref"])->get()->toArray();
            $barcode = Barcode::find($getIdBarcode[0]['id']);
            $barcode->update([
                'status' => 'paid'
            ]);

            return $callbackData;
         }

    }

}
