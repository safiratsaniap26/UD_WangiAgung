<?php

use App\Http\Controllers\API\StokApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/users', function (Request $request) {
    return $request->user();
});
Route::post('/login',[App\Http\Controllers\API\UserController::class,'login']);
Route::group(['middleware' => 'auth:sanctum'], function(){
    
    Route::get('/user/{id}',[App\Http\Controllers\API\UserController::class,'show'])->name('user.show');
    
    // dashboard
    Route::get('/dashboard',[App\Http\Controllers\API\DashBoardApiController::class,'index']);
    
    // stok_barangs
    Route::get('/stoks',[App\Http\Controllers\API\StokApiController::class,'index']);
    Route::post('/stoks/create',[App\Http\Controllers\API\StokApiController::class,'simpan']);
    Route::get('/stok/{id}',[App\Http\Controllers\API\StokApiController::class,'show']);
    Route::get('/stok/{id}/edit',[App\Http\Controllers\API\StokApiController::class,'edit']);
    Route::post('/stok/{id}/update',[App\Http\Controllers\API\StokApiController::class,'update']);
    Route::get('/stok/{id}/delete',[App\Http\Controllers\API\StokApiController::class,'delete']);
    // Route::get('/stoks/cari/{name}',[App\Http\Controllers\API\StokApiController::class,'cari']);
    
    // barang_masuks (tambah stok)
    Route::get('/tambah_stok', [App\Http\Controllers\API\StokApiController::class,'stok']);
    Route::post('/tambah_stok/create', [App\Http\Controllers\API\StokApiController::class,'tambah_stok']);

    // data_pembelis
    Route::get('/pembelis',[App\Http\Controllers\API\PembeliApiController::class,'index']);
    Route::post('/pembelis/create',[App\Http\Controllers\API\PembeliApiController::class,'simpan']);
    Route::get('/pembeli/{id}',[App\Http\Controllers\API\PembeliApiController::class,'show']);
    Route::get('/pembeli/{id}/edit',[App\Http\Controllers\API\PembeliApiController::class,'edit']);
    Route::post('/pembeli/{id}/update',[App\Http\Controllers\API\PembeliApiController::class,'update']);
    Route::get('/pembeli/{id}/delete',[App\Http\Controllers\API\PembeliApiController::class,'delete']);
    // Route::get('/pembelis/cari/{name}',[App\Http\Controllers\API\PembeliApiController::class,'cari']);

    // data_transaksi
    Route::get('/data_transaksi/barang_masuk', [App\Http\Controllers\API\TransaksiApiController::class,'indexMasuk']);
    Route::get('/data_transaksi/barang_keluar', [App\Http\Controllers\API\TransaksiApiController::class,'indexKeluar']);

});