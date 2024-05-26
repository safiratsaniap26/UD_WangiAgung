<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\stok_barang;
use App\BarangMasuk;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stok_barangs = stok_barang::all();
        return view('data_transaksi.tambah_stok', compact(['stok_barangs']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $barang = BarangMasuk::create($request->all());
        $stok = stok_barang::find($request->stok_id);
        $newJumlah = $stok->jumlah_barang + $barang->jumlah;
        $stok->update([
            'jumlah_barang' => $newJumlah
        ]);
        
        session()->flash('success', 'Stok berhasil ditambah');

        return redirect('/data_transaksi/tambah_stok');

        // return back()->with('status', 'Tambah stok barang berhasil !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
