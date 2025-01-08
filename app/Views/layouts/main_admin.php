<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="<?= base_url('material-dashboard-master/assets/css/material-dashboard.css') ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Tambahkan Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <!-- Sidebar -->
    <div class="wrapper">
        <div class="sidebar" data-color="primary">
            <div class="sidebar-wrapper text-center d-flex justify-content-center mt-2">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/dashboard') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/products') ?>">
                            <i class="material-icons">inventory</i>
                            <p>Kelola Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/categories') ?>">
                            <i class="material-icons">category</i>
                            <p>Kelola Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/orders') ?>">
                            <i class="material-icons">receipt_long</i>
                            <p>Laporan Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= site_url('admin/users') ?>">
                            <i class="material-icons">people</i>
                            <p>Pengelolaan User</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <?= $this->renderSection('content'); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Material Dashboard Script -->
    <script src="<?= base_url('material-dashboard-master/assets/js/material-dashboard.js') ?>"></script>
</body>
</html>
