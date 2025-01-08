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
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            color: #fff;
            font-weight: bold;
        }
        .navbar-brand:hover {
            color: #e2e6ea;
        }
        .card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        footer {
            background-color: #007bff;
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }
    </style>
</head>
<body>

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

    <div class="container mt-5">
    <div class="row mb-4">
    <div class="col-md-12">
        <form method="get" action="" class="d-flex justify-content-between align-items-center">
            <!-- Pencarian Produk -->
            <div>
                <input type="text" name="search" value="<?= isset($search) ? $search : '' ?>" placeholder="Cari Produk..." class="form-control d-inline w-auto">
            </div>

            <!-- Filter Kategori -->


            <!-- Filter Alphabet -->


            <!-- Tombol Submit -->
            <div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>
</div>


 <?= $this->renderSection('content'); ?>
    </div>

    <footer>
        <p>&copy; 2024 E-Commerce Platform. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
