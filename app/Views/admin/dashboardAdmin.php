<?= $this->extend('layouts/main_admin'); ?>
<?= $this->section('content'); ?>

<!-- Tambahkan CDN Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
    /* Kustomisasi tampilan */
    body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
    }

    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
    }

    .card .card-header {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border-radius: 0;
        background: linear-gradient(135deg, #ff7c57, #ffba57);
        color: white;
    }

    .card .card-header i {
        font-size: 3rem;
    }

    .card-category {
        font-size: 1rem;
        color: #6c757d;
        font-weight: 600;
    }

    .card-title {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
    }

    /* Warna khusus */
    .card-header.products {
        background: linear-gradient(135deg, #ff7c57, #ffba57);
    }

    .card-header.categories {
        background: linear-gradient(135deg, #5c6bc0, #8e99f3);
    }

    .card-header.orders {
        background: linear-gradient(135deg, #66bb6a, #81c784);
    }

    .card-header.users {
        background: linear-gradient(135deg, #ef5350, #e57373);
    }

    footer {
        text-align: center;
        margin-top: 30px;
        padding: 10px;
        font-size: 0.9rem;
        color: #999;
    }
</style>

<div class="container mt-5">
    <div class="row g-4">
        <!-- Card Produk -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header products">
                    <i class="material-icons">inventory</i>
                </div>
                <div class="card-body text-center">
                    <p class="card-category">Total Produk</p>
                    <h3 class="card-title"><?= $totalProducts ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Kategori -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header categories">
                    <i class="material-icons">category</i>
                </div>
                <div class="card-body text-center">
                    <p class="card-category">Total Kategori</p>
                    <h3 class="card-title"><?= $totalCategories ?? 0 ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Orders -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header orders">
                    <i class="material-icons">receipt_long</i>
                </div>
                <div class="card-body text-center">
                    <p class="card-category">Total Orders</p>
                    <h3 class="card-title"><?= $totalOrders ?? 0 ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Users -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-header users">
                    <i class="material-icons">people</i>
                </div>
                <div class="card-body text-center">
                    <p class="card-category">Total User</p>
                    <h3 class="card-title"><?= $totalUsers ?></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan SweetAlert2 untuk notifikasi -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    <?php if (session()->getFlashdata('pesan')) : ?>
        Swal.fire({
            title: "Berhasil!",
            text: '<?= session()->getFlashdata('pesan'); ?>',
            icon: "success",
            confirmButtonColor: "#ff7c57"
        });
    <?php endif; ?>
</script>

<footer>
    &copy; 2025 Online Shopping Dashboard. All rights reserved.
</footer>

<?= $this->endSection(); ?>
