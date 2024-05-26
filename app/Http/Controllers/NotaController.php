<?php

namespace App\Http\Controllers;


use App\data_pembeli;
use App\Riwayat;
use App\stok_barang;
Use App\Pembelian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class NotaController extends Controller
{
    public function nota()
    {
        $riwayats = DB::table('riwayats')->orderBy('created_at','desc')->get();

    	$pdf = PDF::loadview('mail.nota',['riwayats'=>$riwayats]);
    	return $pdf->stream('mail.nota');
    }

}
