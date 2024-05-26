

<?php $__env->startSection('title'); ?>
Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1 class="mb-3">Dashboard</h1>
<h4>Pilih Kolom Filter</h4>
<div class="row">
<div class="col-md-4">

</div>
<div class="col-md-8">
<div id="range" class="mb-3 form-inline float-right">
      <div class="input-group range">
          <input type="date" style="height: 45px;" class="form-control" id="mindate" placeholder="Min">
          <div class="input-group-prepend">
              <div class="input-group-text">to</div>
          </div>
          <input type="date" style="height: 45px;" class="form-control" id="maxdate" placeholder="Max">
      </div>
      <button id="filterdata" class="btn btn-primary ml-2">Filter</button>

  </div>
</div>
</div>

  

    <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card ">
        <div class="card-people mt-auto">
          <img src="<?php echo e(asset('template/images/dashboard/inventory.png')); ?>">

        </div>
      </div>
    </div>
    <div class="col-md-6 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Jumlah Barang</p>
              <p class="fs-30 mb-2 jumlahbarang"><?php echo e($count); ?></p>
              <p>Jumlah Seluruh Barang</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Stok Barang</p>
              <p class="fs-30 mb-2 stokbarang"><?php echo e(number_format($total,0,',','.')); ?> Kg</p>
              <p>Jumlah Stok di Gudang</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Barang Masuk</p>
              <p class="fs-30 mb-2 barangmasuk"><?php echo e($barang_masuk); ?></p>
              <p>Total Barang Masuk</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Barang Keluar</p>
              <p class="fs-30 mb-2 barangkeluar"><?php echo e($total_keluar); ?></p>
              <p>Total Barang Keluar</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script>

    $("#filterdata").click(()=>{
      var tglawal = $("#mindate").val()
      var tglakhir = $("#maxdate").val()
      var pilihfilter = "Semua"
      axios.post("<?php echo e(url('filterdata')); ?>",{pilihfilter, tglawal,tglakhir})
        .then((res)=>{
        

          $(".jumlahbarang").html(res.data.count)
          $(".stokbarang").html(res.data.total)
          $(".barangmasuk").html(res.data.barang_masuk)
          $(".barangkeluar").html(res.data.total_keluar)
        })
    });

  
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\stok-barang-wangiagung\resources\views//dashboard/dashboard.blade.php ENDPATH**/ ?>