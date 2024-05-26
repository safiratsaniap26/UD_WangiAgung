<?php

namespace App\Http\Controllers\API;

use App\BarangMasuk;
use App\data_pembeli;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Riwayat;
use App\stok_barang;

class TransaksiApiController extends Controller
{
    public function indexMasuk()
    {
        $barang_masuks = BarangMasuk::orderBy('tanggal_masuk', 'desc')->get();
        $stok_barangs = array();
        // $pembelians = Pembelian::orderBy('id', 'desc')->get();
        // $data_pembelis = array();
        // $riwayats = array();
        
        if ($barang_masuks != null) {
            foreach($barang_masuks as $b){
                array_push($stok_barangs, \App\stok_barang::find($b->stok_id));

            }
            return response()->json([
                'barang_masuks' => $barang_masuks,
                'stok_barang'   => $stok_barangs,
            ], 200);  
        } else {
            
        return response()->json([
            'message' => 'Tidak Ada Riwayat Barang Masuk'
        ], 404);  
        }
    }
    public function indexKeluar()
    {
        // $barang_masuks = BarangMasuk::orderBy('tanggal_masuk', 'desc')->get();
        // $stok_barangs = array();
        $pembelians = Pembelian::orderBy('id', 'desc')->get();
        $pembelis = array();
        $riwayats = array();
        
        if ($pembelians != null) {
            foreach($pembelians as $p){
                array_push($riwayats, \App\Riwayat::find($p->riwayat_id));

            }
            foreach($riwayats as $r){
                array_push($pembelis, \App\data_pembeli::find($r->pembeli_id));

            }
            return response()->json([
                'pembelians' => $pembelians,
                'pembelis' => $pembelis,
                'riwayats' => $riwayats,
            ], 200);  
        } else {
            
        return response()->json([
            'message' => 'Tidak Ada Riwayat Barang Masuk'
        ], 404);  
        }
    }
}
