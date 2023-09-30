<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barcode;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $mydate = getdate(date("U"));

        $data = Transaksi::where([
            'status' => "paid",
        ]);

        $dataTahun = $data->where([
            'status' => "paid",
            'tahun' => $mydate['year']
        ])->get();

        $dataBulan = $data->where([
            'bulan' => $mydate['mon']
        ])->get();

        // data penjualan pertahun
        $dataChartTahun = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataChartTahun[] = [
                'y' => $dataTahun->where('bulan', $i)->sum('qty'),
                'label' => date("F", mktime(0, 0, 0, $i, 1, 2000))
            ];
        }


        // data penjualan perbulan
        $dataChartBulan = [];
        for ($i = 1; $i <= 30; $i++) {
            $dataChartBulan[] = [
                'y' => $dataBulan->where('hari', $i)->sum('qty'),
                'label' => $i
            ];
        }

        // data Barcode yang tersedia
        $dataBarcodes = Barcode::where("status", 'paid')->paginate(20);

        // pemeblian tiket hari ini
        $transaksis = $data->where([
            'hari' => $mydate['mday'],
            "bulan" => $mydate['mon'],
            'tahun' => $mydate['year'],
        ])->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.index', [
            'nama' => Auth::user()->name,
            'dataChartTahun' => $dataChartTahun,
            'dataChartBulan' => $dataChartBulan,
            'dataBarcodes'   => $dataBarcodes,
            "date"           => $mydate,
            "transaksis"      => $transaksis
        ]);
    }
}
