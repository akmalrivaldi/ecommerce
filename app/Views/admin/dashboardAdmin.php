<?= $this->extend('layouts/main'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <!-- Card Produk -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-primary card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">inventory</i>
                </div>
                <p class="card-category">Total Produk</p>
                <h3 class="card-title"><?= $totalProducts ?></h3>
            </div>
        </div>
    </div>

    <!-- Card Kategori -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">category</i>
                </div>
                <p class="card-category">Total Kategori</p>
                <h3 class="card-title"><?= $totalCategories ?? 0 ?></h3>
            </div>
        </div>
    </div>

    <!-- Card Orders -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">receipt_long</i>
                </div>
                <p class="card-category">Total Orders</p>
                <h3 class="card-title"><?= $total_orders ?? 0 ?></h3>
            </div>
        </div>
    </div>

    <!-- Card Users -->
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">people</i>
                </div>
                <p class="card-category">Total User</p>
                <h3 class="card-title"><?= $totalUsers ?></h3>
            </div>
        </div>
    </div>
</div>
<script>
        <?php if(session()->getFlashdata('pesan')) :?>
          Swal.fire({
          title: "berhasil!",
          text: '<?= session()->getFlashdata('pesan'); ?>',
          icon: "success"
          });
      <?php endif; ?>
      </script>
<?= $this->endSection(); ?>
