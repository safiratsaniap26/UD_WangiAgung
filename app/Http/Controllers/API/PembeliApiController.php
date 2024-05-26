<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\data_pembeli;
use App\Http\Controllers\Controller;
use App\Riwayat;
use Illuminate\Support\Facades\DB;

class PembeliApiController extends Controller
{
    public function index()
    {
        $data_pembelis = DB::table('data_pembelis')->get();
        return response()-> json([
            'data_pembelis' => $data_pembelis,
        ], 200);
    }

    public function simpan(Request $request)
    {
        if(isset($request->kode_pembeli)) {
            $this->validate($request,[
                'nama_pembeli'=>'required',
                'alamat_pembeli'=>'required' ,
                'nomor_hp'=>'required',
                'email_pembeli'=>'required|email',
                'kode_pembeli'=>'required'
            ]);

            data_pembeli::create($request->all());

            return response()-> json([
                'message' => 'Data pembeli berhasil ditahmbahkan'
            ], 200);
        } else {
            $this->validate($request,[
                'nama_pembeli'=>'required',
                'alamat_pembeli'=>'required' ,
                'nomor_hp'=>'required',
                'email_pembeli'=>'required|email'
            ]);

            $cari = "NAMA";
            $max_no = data_pembeli::where('kode_pembeli','like',"%".$cari."%")->max('kode_pembeli');

            if($max_no == null) {
                $kode_pembeli = "NAMA_1";
            } else {
                $kode_pembeli = (int)substr($max_no, 5);
                $kode_pembeli += 1;
                $kode_pembeli = "NAMA_".$kode_pembeli;
            }

            data_pembeli::create([
                'nama_pembeli' => $request->nama_pembeli,
                'alamat_pembeli' => $request->alamat_pembeli,
                'nomor_hp' => $request->nomor_hp,
                'email_pembeli' => $request->email_pembeli,
                'kode_pembeli' => $kode_pembeli
            ]);

            return response()-> json([
                'message' => 'Data pembeli berhasil ditahmbahkan'
            ], 200);
        }
        
    }

    public function show($id_pembeli)
    {
        $pembeli = data_pembeli::find($id_pembeli);
        $riwayats = data_pembeli::find($id_pembeli)->riwayat;
       
        if ($pembeli != null) {

            return response()-> json ([
                'message' => 'Data pembeli berhasil diambil',
                'pembeli'   => $pembeli,
                'riwayats'   => $riwayats,
            ], 200);
        } else {
            # code...
            return response()-> json ([
                'message' => 'Data pembeli tidak ditemukan!'
            ], 404);
        }
    }

    public function edit($id)
    {
        $data = data_pembeli::find($id);

        if ($data != null) {
            return response()-> json([
                'pembeli' => $data,
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data Pembeli tidak ditemukan! Tidak bisa ditampilkan'
            ], 404);
        }
    }

    public function update($id)
    {
        $this->validate(request(),[
            'nama_pembeli'=>'required',
            'alamat_pembeli'=>'required' ,
            'nomor_hp'=>'required',
            'email_pembeli'=>'required|email' 
        ]);

        $data=request()->all();
        $table=data_pembeli::find($id);
        if ($table != null) {
            $table->nama_pembeli=$data["nama_pembeli"];
            $table->alamat_pembeli=$data["alamat_pembeli"];
            $table->nomor_hp=$data["nomor_hp"];
            $table->email_pembeli=$data["email_pembeli"];

            $table->save();

            return response()-> json([
                'message' => 'Data pembeli berhasil diubah'
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data pembeli tidak ditemukan! Tidak bisa diupdate'
            ], 400);
        }
    }

    public function delete($id)
    {
        $data=data_pembeli::find($id);
        if ($data != null) {
            $data -> delete();
            return response()-> json([
                'message' => 'Data pembeli berhasil dihapus'
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data pembeli tidak ditemukan! Tidak bisa dihapus'
            ], 400);
        }
        
    }

    public function cari(Request $request)
    {
	// menangkap data pencarian
	$search = $request->search;
 
 	// mengambil data dari table pegawai sesuai pencarian data
	$data_pembelis = DB::table('data_pembelis')
	->where('nama_pembeli',"%".$search."%")
	->paginate(5);
 
    	// mengirim data pegawai ke view index
        if ($data_pembelis != null) {
            # code...
            return response()-> json([
                'data_pembelis'      => $data_pembelis,
            ], 200);
        } else {
            return response()-> json([
                'message' => 'Data pembeli tidak ditemukan!'
            ], 404);
        }
 
    }
}
