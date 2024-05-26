@extends('template.app')

@section('title')
Tambah Stok
@endsection

@section('content')

<h1 class="text-center my-2 my-lg-3">Tambah Stok</h1>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Tambah Stok Barang</div>

            <div class="card-body">
                <form  method="post" action="{{ route('tambahStok') }}">
                        @csrf
                        <select id="pembeli_id" class="js-example-basic-single form-control" name="stok_id" required>
                                <option selected disabled>Pilih Barang</option>
                                    @foreach($stok_barangs as $b)
                                        <option value="{{ $b->id }}">{{ $b->kode_barang }} - {{ $b->nama_barang }} - {{ $b->jumlah_barang }}</option>
                                    @endforeach
                        </select>
                    
                        <div class="mt-3">
                            @csrf
                            <input id="tambahStok" name="jumlah" type="number" class="form-control" placeholder="Jumlah Stok" required> 
                        </div>      

                        <div class="mt-3">
                            <p class="font-weight-bold">Tanggal Masuk:</p>
                                <input class="date form-control" type="date" class="form-control" placeholder="Tahun-Bulan-Tanggal" name="tanggal_masuk" required>
                        </div>

                        <div class="mt-3">
                            <p class="font-weight-bold">Tanggal Expired:</p>
                                <input class="date form-control" type="date" class="form-control" placeholder="Tahun-Bulan-Tanggal" name="tanggal_expired" required>
                        </div>
                
                        <div class="form-group text-center">
                        <button type="submit" class="btn btn-success mt-5"> Tambah </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>

@endsection