

<?php $__env->startSection('title'); ?>
Chart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 
  <h1 class="mb-5">Grafik Barang Diminati</h1>
  <h4>Pilih Kolom Filter</h4>

  <div id="range" class="mb-3 form-inline">
      <div class="input-group range">
          <input type="date" style="height: 45px;" class="form-control" id="mindate" placeholder="Min">
          <div class="input-group-prepend">
              <div class="input-group-text">to</div>
          </div>
          <input type="date" style="height: 45px;" class="form-control" id="maxdate" placeholder="Max">
      </div>
      <button id="filterdata" class="btn btn-primary ml-2">Filter</button>

  </div>

  <!-- Grafik -->
  <div class="row">
    <div class="col-md-12 ">
      <div class="card ">
        <div class="card-header ">
        </div>
        <div class="card-body ">
          <div id="grafik"></div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>

    $("#filterdata").click(()=>{
      var tglawal = $("#mindate").val()
      var tglakhir = $("#maxdate").val()
      axios.post("<?php echo e(url('filterdata')); ?>",{pilihfilter:"Barang Diminati", tglawal,tglakhir})
        .then((res)=>{
          chartdata.series[0].update({
            data: res.data.datatable
          }, true);

          console.log(res.data.datatable)

          $(".jumlahbarang").html(res.data.count)
          $(".stokbarang").html(res.data.total)
          $(".barangmasuk").html(res.data.barang_masuk)
          $(".barangkeluar").html(res.data.total_keluar)
        })
    });

    var chartdata = Highcharts.chart('grafik', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Barang yang diminati'
        },
        subtitle: {
            text: 'UD WANGI AGUNG'
        },
        xAxis: {
          type: 'category',
          labels: {
              rotation: -45,
              style: {
                  fontSize: '13px',
                  fontFamily: 'Verdana, sans-serif'
              }
          }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Barang Keluar'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
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
            name: 'Jumlah',
            data: <?php echo json_encode($data); ?>

        }],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    });


    
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok-barang-wangiagung\resources\views/dashboard/chart.blade.php ENDPATH**/ ?>