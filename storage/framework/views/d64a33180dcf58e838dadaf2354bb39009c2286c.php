

<?php $__env->startSection('title'); ?>
Tambah Stok
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<h1 class="text-center my-2 my-lg-3">Tambah Stok</h1>

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Tambah Stok Barang</div>

            <div class="card-body">
                <form  method="post" action="<?php echo e(route('tambahStok')); ?>">
                        <?php echo csrf_field(); ?>
                        <select id="pembeli_id" class="js-example-basic-single form-control" name="stok_id" required>
                                <option selected disabled>Pilih Barang</option>
                                    <?php $__currentLoopData = $stok_barangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($b->id); ?>"><?php echo e($b->kode_barang); ?> - <?php echo e($b->nama_barang); ?> - <?php echo e($b->jumlah_barang); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    
                        <div class="mt-3">
                            <?php echo csrf_field(); ?>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('template.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Teknik Informatika\Web Programing\application\wangi-agung-web\resources\views/data_transaksi/tambah_stok.blade.php ENDPATH**/ ?>