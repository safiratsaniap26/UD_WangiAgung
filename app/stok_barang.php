<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stok_barang extends Model
{
    protected $table = 'stok_barangs';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'nama_barang',
        'asal_barang',
        'jumlah_barang',
        'harga_jual',
    	'harga_beli',
        'kode_barang',
    ];
    
    public function pembelian()
    {
        return $this->hasMany('App/Pembelian', 'stok_barang_id');
    }
}