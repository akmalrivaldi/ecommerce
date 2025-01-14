<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: #ff7043; /* Orange color */
            padding: 15px;
        }

        .navbar-brand {
            color: #fff;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-item.active .nav-link {
            background-color: #e64a19;
            color: white;
            border-radius: 25px;
            padding: 8px 15px;
        }

        .navbar-nav .nav-link.active {
            color: #fff;
            background-color: #e64a19;
            border-radius: 25px;
        }

        /* Form Control */
        .form-control, .form-select {
            border-radius: 20px;
        }

        .form-control, .form-select {
            height: 40px;
        }

        /* Button styles */
        .filter-btn {
            background-color: #ff7043;
            color: white;
            border-radius: 25px;
            padding: 8px 16px;
            font-weight: 500;
            border: none;
        }

        .filter-btn:hover {
            background-color: #e64a19;
            color: white;
        }

        /* Cards and Tables */
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 8px;
            border: 1px solid #eee;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #ff7043;
            color: white;
        }

        .table-hover tbody tr:hover {
            background-color: #fbe9e7;
        }

        /* Footer */
        footer {
            background-color: #ff7043;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            font-size: 14px;
        }

    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">E-Commerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('user/dashboard') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('cart') ?>">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('cart/orders') ?>">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= site_url('profile') ?>">Profil saya</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-danger" href="/logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Content -->
<div class="container mt-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <form method="get" action="" class="d-flex justify-content-between align-items-center">
                <!-- Pencarian Produk -->
                <div>
                    <input type="text" name="search" value="<?= isset($search) ? $search : '' ?>" placeholder="Cari Produk..." class="form-control d-inline w-auto">
                </div>

                <!-- Tombol Filter (Dihilangkan karena tidak berfungsi) -->
                <div>
                    <button type="submit" class="filter-btn">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Produk List -->
    <?= $this->renderSection('content'); ?>

</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 E-Commerce Platform. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
