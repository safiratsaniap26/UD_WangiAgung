<?php

namespace App\Http\Controllers\API;

use App\BarangMasuk;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\stok_barang;
use Illuminate\Http\Request;

class DashBoardApiController extends Controller
{
    public function index()
    {
        $count = stok_barang::count();
        $total = stok_barang::sum('jumlah_barang');
        $barang_masuk = BarangMasuk::sum('jumlah');
        $total_keluar = Pembelian::sum('jumlah'); 

        return response() -> json ([
            'message' => 'Informasi gudang berhasil diambil',
            'count' => $count,
            'total' =>  $total ,
            'barang_masuk' =>  $barang_masuk,
            'total_keluar' => $total_keluar ,
        ], 200);
    }
}
