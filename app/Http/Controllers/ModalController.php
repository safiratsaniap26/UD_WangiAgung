<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\modal;
use App\BarangMasuk;
use App\Riwayat;
use Carbon\Carbon;

class ModalController extends Controller
{
    public function grafik()
    {
        $modals = \App\modal::all();

        $categories = [];
        $data = [];

        foreach($modals as $modal){
            $categories[] = $modal->bulan;
            $data[] = $modal->modal;
        }

        return view('/keuangan/grafik',['modals' => $modals, 'categories' => $categories, 'data' => $data]);
    }

    public function tambah(Request $request)
    {
        $modal = modal::find($request->id_bulan);
        $modal->update([
            'modal'=>$request->modal,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        return redirect('/keuangan/grafik')->with('sukses','Modal Berhasil Ditambahkan');
    }

    public function hapus()
    {
        DB::table('modals')->update(['modal'=>0]);
        return redirect('/keuangan/grafik');
    }

    public function hapus_bulan(Request $request)
    {
        $modal = modal::find($request->id_bulan);
        $modal->update(['modal'=>0]);
        return redirect('/keuangan/grafik');
    }

    public function modal(Request $r)
    {
        $tahun = $r->tahun;
        // bARANG MASUK
        $modaldata = BarangMasuk::join('stok_barangs','stok_barangs.id','barang_masuks.stok_id')
        ->select('barang_masuks.id as bid','stok_barangs.id as stok_id',
            'barang_masuks.jumlah','stok_barangs.nama_barang','stok_barangs.harga_beli','stok_barangs.harga_jual',
            'stok_barangs.kode_barang',
            DB::raw("DATE_FORMAT(barang_masuks.tanggal_masuk, '%M')as tanggal_masuk"),
            DB::raw("DATE_FORMAT(barang_masuks.tanggal_masuk, '%Y')as tahun"),
            DB:: raw('sum(barang_masuks.jumlah * stok_barangs.harga_beli) as total')     
        )
        ->groupBy(DB::raw("DATE_FORMAT(barang_masuks.tanggal_masuk, '%M')"))
        ->orderBy("barang_masuks.tanggal_masuk",'ASC')
        ->get();
        $modals = [];
        $modalssemua = [];
        $modaltotal = 0;
        foreach ($modaldata as $key => $m) {
            $nmonth = date("m", strtotime($m->tanggal_masuk));
        // bARANG kELUAR
            $bk = Riwayat::whereMonth('tanggal_pembelian',$nmonth)
            ->join('pembelians','pembelians.riwayat_id','riwayats.id')
            ->join('stok_barangs','pembelians.kode_barang','stok_barangs.kode_barang')
            ->select(
                "pembelians.id as pid","riwayats.id as rid","stok_barangs.kode_barang",
                DB::raw('sum(stok_barangs.harga_beli * pembelians.jumlah) as keluar'),
                DB::raw("DATE_FORMAT(riwayats.tanggal_pembelian, '%M')as tanggal_pembelian"),
                DB::raw("DATE_FORMAT(riwayats.tanggal_pembelian, '%Y')as tahun"),
            )
            ->groupBy(DB::raw("DATE_FORMAT(riwayats.tanggal_pembelian, '%M')"))
            ->first();
             // Keuntungan
            $untung = Riwayat::whereMonth('tanggal_pembelian',$nmonth)
            ->join('pembelians','pembelians.riwayat_id','riwayats.id')
            ->join('stok_barangs','pembelians.kode_barang','stok_barangs.kode_barang')
            ->select(
                "pembelians.id as pid","riwayats.id as rid","stok_barangs.kode_barang",
                DB::raw('sum((stok_barangs.harga_jual - stok_barangs.harga_beli) * pembelians.jumlah) as keuntungan'),
                DB::raw("DATE_FORMAT(riwayats.tanggal_pembelian, '%M')as tanggal_pembelian"),
                DB::raw("DATE_FORMAT(riwayats.tanggal_pembelian, '%Y')as tahun"),
            )
            ->groupBy(DB::raw("DATE_FORMAT(riwayats.tanggal_pembelian, '%M')"))
            ->first();
            // Hasil
            $modaltotal = $modaltotal + ((int)$m->total - ($bk ? (int)$bk->keluar : 0));
            $a = [
                "bulan"=>$m->tanggal_masuk,
                "modal"=>$modaltotal,
                "keuntungan"=>$untung ? (int)$untung->keuntungan : 0,
            ];
            array_push($modalssemua,$a);
            if($m->tahun == $tahun){
                array_push($modals,$a);
            }
        }
       
        $bulan = [];
        $modal = [];
        $keuntungan = [];

        foreach ($modals as $key => $m) {
            array_push($bulan,$m['bulan']);
            array_push($modal,$m['modal']);
            array_push($keuntungan,$m['keuntungan']);
        }
        return response()->json([$bulan,$modal,$keuntungan]);

    }
}
