<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokBarangs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('asal_barang');
            $table->integer('jumlah_barang');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->string('kode_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stok_barangs');
    }
}
