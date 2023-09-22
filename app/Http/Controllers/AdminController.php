<?php

namespace App\Http\Controllers;

use App\Models\DaftarTransaksi;
use App\Models\Barcode;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $mydate = getdate(date("U"));

        $dataTahun = DaftarTransaksi::where([
            'status' => 1,
            'tahun' => $mydate['year']
        ])->get();

        $dataBulan = DaftarTransaksi::where([
            'status' => 1,
            'tahun' => $mydate['year'],
            'bulan' => $mydate['mon']
        ])->get();

        // data penjualan pertahun
        $dataChartTahun = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataChartTahun[] = [
                'y' => $dataTahun->where('bulan', $i)->sum('jumlah_orang'),
                'label' => date("F", mktime(0, 0, 0, $i, 1, 2000))
            ];
        }

        // data penjualan perbulan
        $dataChartBulan = [];
        for ($i = 1; $i <= 30; $i++) {
            $dataChartBulan[] = [
                'y' => $dataBulan->where('hari', $i)->sum('jumlah_orang'),
                'label' => $i
            ];
        }

        // data Barcode yang tersedia

        $dataBarcodes = Barcode::latest()->paginate(20);


        return view('admin.index', [
            'nama' => Auth::user()->name,
            'dataChartTahun' => $dataChartTahun,
            'dataChartBulan' => $dataChartBulan,
            'dataBarcodes'   => $dataBarcodes
        ]);
    }
}
