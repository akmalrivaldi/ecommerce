<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-12">
        <h1>User Dashboard</h1>
        <p>Selamat datang, <?= session()->get('name_user') ?>!</p>
    </div>
</div>

<!-- Contoh Daftar Produk -->
<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 1">
            <div class="card-body">
                <h5 class="card-title">Produk 1</h5>
                <p class="card-text">Deskripsi singkat produk 1.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Product 2">
            <div class="card-body">
                <h5 class="card-title">Produk 2</h5>
                <p class="card-text">Deskripsi singkat produk 2.</p>
                <a href="#" class="btn btn-primary">Beli Sekarang</a>
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
<?= $this->endSection() ?>
