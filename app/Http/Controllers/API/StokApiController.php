<?php

namespace App\Http\Controllers\API;

use App\BarangMasuk;
use App\data_pembeli;
use App\Http\Controllers\Controller;
use App\Pembelian;
use App\Riwayat;
use App\stok_barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokApiController extends Controller
{
    public function index()
    {
        $stok_barangs = DB::table('stok_barangs')->orderBy('created_at','desc')->get();
        return response()-> json([
            'stok_barangs' => $stok_barangs,
        ], 200);
    }

    public function simpan(Request $request)
    {
        if(isset($request->kode_barang)) {
            $this->validate($request,[
                'nama_barang'=>'required',
                'asal_barang'=>'required' ,
                'harga_beli'=>'required',
                'harga_jual'=>'required',
                'kode_barang'=>'required|unique',
            ]);

            stok_barang::create($request->all());
    
            return response()-> json([
                'message' => 'Data barang berhasil ditahmbahkan'
            ], 200);
        } else {
            $this->validate($request,[
                'nama_barang'=>'required',
                'asal_barang'=>'required' ,
                'harga_beli'=>'required',
                'harga_jual'=>'required',
            ]);

            $cari = "UDWA";
            $max_no = stok_barang::where('kode_barang','like',"%".$cari."%")->max('kode_barang');
            
            if($max_no == null) {
                $kode_barang = "UDWA_1";
            } else {
                $kode_barang = (int)substr($max_no, 5);
                $kode_barang += 1;
                $kode_barang = "UDWA_".$kode_barang;
            }

            // dd($kode_barang);
            stok_barang::create([
                'nama_barang' => $request->nama_barang,
                'asal_barang' => $request->asal_barang,
                'harga_beli' => $request->harga_beli,
                'harga_jual' => $request->harga_jual,
                'kode_barang' => $kode_barang,
            ]);
    
            return response()-> json([
                'message' => 'Data barang berhasil ditahmbahkan'
            ], 200);
        }
    }

    public function show($id)
    {
        $barang = stok_barang::find($id);
        if ($barang != null) {
            $pembelians = Pembelian::where('kode_barang', $barang->kode_barang)->orderBy('created_at', 'desc')->get();
            $riwayats = array();
            $pembelis = array();
            foreach($pembelians as $p){
                array_push($riwayats, \App\Riwayat::find($p->riwayat_id));

            }
            foreach($riwayats as $r){
                array_push($pembelis, \App\data_pembeli::find($r->pembeli_id));

            }
            return response()-> json([
                'message'   => 'Berhasil menampilkan data barang',
                'stok'      => $barang,
                'pembelians'    => $pembelians,
                'riwayats'    => $riwayats,
                'pembelis'    => $pembelis,
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data barang tidak ditemukan!'
            ], 404);
        }
       
    }

    public function edit($id)
    {
        $barang = stok_barang::find($id);

        if ($barang != null) {
            return response()-> json([
                'stok' => $barang,
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data barang tidak ditemukan! Tidak bisa ditampilkan'
            ], 404);
        }
    }

    public function update($id)
    {
        $this->validate(request(),[
            'nama_barang'=>'required',
            'asal_barang'=>'required' ,
            'harga_beli'=>'required',
            'harga_jual'=>'required',
            'kode_barang'=>'required', 
        ]);

        $barang=request()->all();
        $table=stok_barang::find($id);
        if ($table != null) {
            $table->nama_barang=$barang["nama_barang"];
            $table->asal_barang=$barang["asal_barang"];
            $table->harga_beli=$barang["harga_beli"];
            $table->harga_jual=$barang["harga_jual"];
            $table->kode_barang=$barang["kode_barang"];
    
            $table->save();
    
            return response()-> json([
                'message' => 'Data barang berhasil diubah'
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data barang tidak ditemukan! Tidak bisa diupdate'
            ], 400);
        }
        
    }

    public function cari($name)
    {
 
 	// mengambil data dari table pegawai sesuai pencarian data
	$stok_barangs = DB::table('stok_barangs')
	->where('nama_barang','like',"%".$name."%");
    
        if ($stok_barangs != null) {
            # code...
            return response()-> json([
                'stoks_barangs'      => $stok_barangs,
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data barang tidak ditemukan!'
            ], 404);
        }
    }

    public function delete($id)
    {
        $barang = stok_barang::find($id);

        if ($barang != null) {
            $barang->delete();
            return response()-> json([
                'message' => 'Data barang berhasil dihapus'
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data barang tidak ditemukan! data gagal dihapus'
            ], 404);
        }
    }

    public function stok(){
        $stok_barangs = stok_barang::all();
        
        if ($stok_barangs != null) {
            return response()->json([
                'stok_barangs' => $stok_barangs,
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Barang masih kosong',
            ], 404);
        }
        
    }

    public function tambah_stok(Request $request)
    {
        //
        $barang = BarangMasuk::create($request->all());
        $stok_barangs = stok_barang::find($request->stok_id);
        $newJumlah = $stok_barangs->jumlah_barang + $barang->jumlah;
        $stok_barangs->update([
            'jumlah_barang' => $newJumlah
        ]);
        
        if ($stok_barangs != null) {
            return response()->json([
                'message' => 'Stok Barang berhasil ditambahkan',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Data Barang tidak ditemukan!',
            ], 404);
        }
    }
}
