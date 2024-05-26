

<?php $__env->startSection('title'); ?>
Chart
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 
  <h1 class="mb-5">Grafik Barang Keluar</h1>

  <h4 class="mt-5">Filter Barang Keluar</h4>
  <select style="width: 200px;" class="js-example-basic-single form-control mb-3" id="filter_bk">
    <option selected disabled>Pilih Barang</option>
    <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($stok->kode_barang); ?>"><?php echo e($stok->nama_barang); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select> 
  <div id="range" class="mb-3 form-inline">
      <div class="input-group range">
          <input type="date" style="height: 45px;" class="form-control" id="mindate2" placeholder="Min">
          <div class="input-group-prepend">
              <div class="input-group-text">to</div>
          </div>
          <input type="date" style="height: 45px;" class="form-control" id="maxdate2" placeholder="Max">
      </div>
      <button id="filterdata_bk" class="btn btn-primary ml-2">Filter</button>

  </div>

  <!-- Grafik -->
  <div class="row">
    <div class="col-md-12 ">
      <div class="card ">
        <div class="card-header ">
        </div>
        <div class="card-body ">
          <div id="grafik2"></div>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="https://code.highcharts.com/highcharts.src.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>

   
    $("#filterdata_bk").click(()=>{
      var tglawal = $("#mindate2").val()
      var tglakhir = $("#maxdate2").val()
      var filter_bk = $("#filter_bk").val()
      console.log(tglawal, tglakhir, filter_bk);
      axios.post("<?php echo e(url('filterdata_bk')); ?>",{filter_bk, tglawal, tglakhir})
        .then((res)=>{
          console.log(res.data);
          chartdata2.series[0].update({
            data: res.data
          }, true);
        })

    });

    var chartdata2 = Highcharts.chart('grafik2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Barang Keluar'
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
            data: false
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
<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok-barang-wangiagung\resources\views/dashboard/chartbarangkeluar.blade.php ENDPATH**/ ?>