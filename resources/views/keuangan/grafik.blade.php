@extends('template.app')

@section('title')
Modal
@endsection

@section('content')

<script src="https://code.highcharts.com/highcharts.src.js"></script>
<h1 class="mb-5">Modal Perusahaan</h1>
<?php
$tg_awal= 2021;
$tgl_akhir= date('Y')+1;
?>

<div class="row mb-3">
    <div class="col-md-4">  
        <select name="tahun" id="tahun" class="form-control">
            @for($i=$tgl_akhir; $i>=$tg_awal; $i--)
                <option value="{{$i}}">{{$i}}</option>
            @endfor
        </select>
    </div>
</div>

<div class="panel">
    <div id="grafik">
    </div>
</div>
@endsection
@section('js')
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>

$(document).ready(()=>{
    const d = new Date();
    let year = d.getFullYear();
    $("#tahun").val(year)
    updateChart(year)
})

$("#tahun").change(()=>{
   var tahun = $("#tahun").val()
   updateChart(tahun) 
})

function updateChart(tahun) {
    axios.post("{{url('modalgrafik')}}",{tahun:tahun})
    .then((res)=>{
        console.log(res.data[2])
        chartdata.xAxis[0].update({categories: 
            res.data[0]
    },true);

    chartdata.series[0].update({
            data: res.data[1]
          }, true);
    chartdata.series[1].update({
    data: res.data[2]
    }, true);


    })

}

var chartdata = Highcharts.chart('grafik', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Modal dan Keuntungan'
    },

    xAxis: {
        categories: [

        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: '(Rp)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>Rp {point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Modal',
        data: []

    }, {
        name: 'Keuntungan',
        data: []

    }]
});
</script>
@endsection 