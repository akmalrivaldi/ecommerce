<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="<?= base_url('material-dashboard-master/assets/css/material-dashboard.css') ?>" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* General Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
            color: #4a4a4a;
        }

        .wrapper {
            display: flex;
            flex-direction: row;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px 10px;
        }

        .sidebar .sidebar-wrapper {
            font-size: 1rem;
        }

        .sidebar .nav {
            list-style: none;
            padding: 0;
        }

        .sidebar .nav-item {
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            color: #4a4a4a;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            border-radius: 8px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .sidebar .nav-link i {
            font-size: 1.8rem;
            margin-right: 15px;
            color: #5c6bc0;
        }

        .sidebar .nav-link:hover {
            background-color: #e8eaf6;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .nav-link.active {
            background-color: #5c6bc0;
            color: white;
            box-shadow: 0px 4px 12px rgba(92, 107, 192, 0.5);
        }

        .sidebar .nav-link.active i {
            color: white;
        }

        /* Main Panel Styles */
        .main-panel {
            flex-grow: 1;
            background-color: #ffffff;
            padding: 20px;
            overflow-y: auto;
        }

        .main-panel .content {
            padding: 20px;
            border-radius: 10px;
            background-color: #f8f9fa;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.05);
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .sidebar .nav-link i {
                font-size: 1.5rem;
                margin-right: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <!-- Sidebar Items -->
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == site_url('admin/dashboard') ? 'active' : '' ?>" href="<?= site_url('admin/dashboard') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == site_url('admin/products') ? 'active' : '' ?>" href="<?= site_url('admin/products') ?>">
                            <i class="material-icons">inventory</i>
                            <p>Kelola Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == site_url('admin/categories') ? 'active' : '' ?>" href="<?= site_url('admin/categories') ?>">
                            <i class="material-icons">category</i>
                            <p>Kelola Kategori</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == site_url('admin/orders') ? 'active' : '' ?>" href="<?= site_url('admin/orders') ?>">
                            <i class="material-icons">receipt_long</i>
                            <p>Laporan Orders</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= current_url() == site_url('admin/users') ? 'active' : '' ?>" href="<?= site_url('admin/users') ?>">
                            <i class="material-icons">people</i>
                            <p>Pengelolaan User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/logout">
                            <i class="material-icons">logout</i>
                            <p>Logout</p>
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
