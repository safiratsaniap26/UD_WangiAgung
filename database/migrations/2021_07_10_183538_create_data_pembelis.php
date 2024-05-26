<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataPembelis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pembelis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pembeli');
            $table->string('alamat_pembeli');
            $table->string('nomor_hp');
            $table->string('email_pembeli');
            $table->string('kode_pembeli');
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
        Schema::dropIfExists('data_pembelis');
    }
}
