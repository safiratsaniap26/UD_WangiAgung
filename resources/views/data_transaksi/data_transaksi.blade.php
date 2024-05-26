@extends('template.app')

@section('title')
Data Transaksi
@endsection

@section('css')
<style>


.range {
    max-width: 300px;
}
</style>
@endsection

@section('content')
<div class="content">

    <h1>Data Transaksi Barang<img align="right" src="https://i.ibb.co/DpbskFt/Ud-Wangi-Agung.png" alt="Ud-Wangi-Agung" border="0" width="200" height="80"></h1>
    
    <div class="row" style="
    margin-top: 50px;">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-body ">

                    <h2 class="mt-2">Barang Masuk</h2><hr>
        
                    <table id="table" class="table table-hover">
                        <div class="d-flex justify-content-between">
                            <div id="outside" class="mb-3"></div>
                            <div id="range" class="mb-3 form-inline">
                                <div class="input-group range">
                                    <input type="text" class="form-control" id="min" placeholder="Min">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">to</div>
                                    </div>
                                    <input type="text" class="form-control" id="max" placeholder="Max">
                                </div>
                            </div>
                        </div>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tgl.Masuk</th>
                                <th scope="col">Tgl.Expired</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah(kg)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($barang_masuk as $bm)
                                <?php
                                    $weekago = date('Y-m-d', strtotime('-7 day', strtotime($bm->tanggal_expired)));
                                    if($bm->tanggal_expired < Carbon\Carbon::now()) {
                                        $color = 'bg-danger';
                                    } elseif(Carbon\Carbon::now() > $weekago) {
                                        $color = 'bg-warning';
                                    } else {
                                        $color = '';
                                    }
                                    $stok = \App\stok_barang::find($bm->stok_id);
                                ?>
                                <tr class={{$color}}>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$bm->tanggal_masuk}}</td>
                                    <td>
                                        {{$bm->tanggal_expired}}
                                    </td>
                                    <td>{{$stok->nama_barang}}</td>
                                    <td>{{$bm->jumlah}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card card-stats">
                <div class="card-body ">

                    <h2 class="mt-2" >Barang Keluar</h2><hr>

                    <table id="table1" class="table table-hover">
                        <div class="d-flex justify-content-between">
                            <div id="outside1" class="mb-3"></div>
                            <div id="range" class="mb-3 form-inline">
                                <div class="input-group range">
                                    <input type="text" class="form-control" id="min1" placeholder="Min">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">to</div>
                                    </div>
                                    <input type="text" class="form-control" id="max1" placeholder="Max">
                                </div>
                            </div>
                        </div>
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Pembeli</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Jumlah(kg)</th>
                                <th scope="col">Total</th>
                                <th scope="col">Kasir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembelians as $p)
                            <tr>
                                <?php
                                    $r = \App\Riwayat::find($p->riwayat_id);
                                    $u = \App\data_pembeli::find($r->pembeli_id);
                                ?>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$r->tanggal_pembelian}}</td>
                                <td>{{$u->nama_pembeli}}</td>
                                <td>{{$p->nama_barang}}</td>
                                <td>{{$p->jumlah}}</td>
                                <td>Rp {{number_format($p->total, 0, ",", ".")}}</td>
                                <td>{{$r->nama_kasir}}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Berhasil !!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <div class="modal-body">
                {{ session('status') }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://momentjs.com/downloads/moment.min.js"></script>
@if(session('status'))
    <script>
        $(function() {
            $('#staticBackdrop').modal('show');
        });
    </script>

@endif

<script>
    var minDate, maxDate;
    $(document).ready(function(){
        $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
            if ( settings.nTable.id !== 'table' ) {
                return true;
            }
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date( data[1] );
    
            if (
                ( min === null && max === null ) ||
                ( min === null && date <= max ) ||
                ( min <= date && max === null ) ||
                ( min <= date && date <= max )
            ) {
                return true;
            }
            return false;
        }
    );

    var minDate1, maxDate1;

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        if ( settings.nTable.id !== 'table1' ) {
            return true;
        }

        var min1 = minDate1.val();
        var max1 = maxDate1.val();
        var date1 = new Date( data[1] );

        if (
            ( min1 === null && max1 === null ) ||
            ( min1 === null && date1 <= max1 ) ||
            ( min1 <= date1 && max1 === null ) ||
            ( min1 <= date1 && date1 <= max1 )
        ) {
            return true;
        }
        return false;
    }
);

        minDate = new DateTime($('#min'), {
            format: 'DD-MM-YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'DD-MM-YYYY'
        });

         $('#table').DataTable({
            buttons: [
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    title:     'Barang Masuk',
                    titleAttr: 'Print',
                    className: 'btn btn-md btn-print'
                },

            ],

            lengthChange: true,
            searching: true

        })
        .buttons()
        .container()
        .appendTo("#outside");

     


        $('#min, #max').on('change', function () {
            $('#table').DataTable().draw();
        });

        minDate1 = new DateTime($('#min1'), {
            format: 'DD-MM-YYYY'
        });
        maxDate1 = new DateTime($('#max1'), {
            format: 'DD-MM-YYYY'
        });

        $('#table1').DataTable({
            buttons: [
                {
                    extend:    'print',
                    text:      '<i class="fa fa-print"></i>',
                    title:    'Barang Keluar',
                    titleAttr: 'Print',
                    className: 'btn btn-md btn-print'
                },

            ],

            lengthChange: true,
            searching: true

        })
        .buttons()
        .container()
        .appendTo("#outside1");

        $('#min1, #max1').on('change', function () {
            $('#table1').DataTable().draw();
        });

    })


</script>

@endsection