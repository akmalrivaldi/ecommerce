<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= $title; ?> | E-Commerce</title>

    <style>
      body {
        background-color: #f8f9fa;
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
      }
      .container {
        max-width: 900px;
      }
      .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      }
      .card img {
        height: 100%;
        object-fit: cover;
      }
      .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 15px;
        font-size: 14px;
      }
      .form-control:focus {
        border-color: #ff6f61;
        box-shadow: 0 0 0 0.2rem rgba(255, 111, 97, 0.25);
      }
      .btn-primary {
        background-color: #ff6f61;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        padding: 12px;
      }
      .btn-primary:hover {
        background-color: #ff5649;
      }
      .text-muted a {
        color: #ff6f61;
        text-decoration: none;
      }
      .text-muted a:hover {
        text-decoration: underline;
      }
      .brand-logo {
        width: 50px;
        height: 50px;
        object-fit: contain;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <!-- Left Section: Illustration -->
        <div class="col-md-6 d-none d-md-block">
          <img src="<?= base_url('material-dashboard-master/assets/img/Ecommerce checkout laptop-amico.png'); ?>" class="img-fluid" alt="E-commerce Illustration">
        </div>

        <!-- Right Section: Login Form -->
        <div class="col-md-6">
          <div class="card p-4">
            <div class="text-center mb-4">
              <img src="<?= base_url('material-dashboard-master/assets/img/logo_e-removebg-preview.png'); ?>" alt="Logo" class="brand-logo">
              <h3 class="img/fw-bold mt-2">Welcome Back!</h3>
              <p class="text-muted">Log in to your e-commerce account</p>
            </div>
            <form action="/login/process" method="post">
              <?= csrf_field() ?>
              <div class="mb-4">
                <label for="email" class="form-label fw-semibold">Email Address</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter your email"
                  required
                />
              </div>
              <div class="mb-4">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Enter your password"
                  required
                />
              </div>
              <div class="d-flex justify-content-between align-items-center mb-4">
              </div>
              <button type="submit" class="btn btn-primary w-100">Log In</button>
            </form>
            <div class="text-center mt-4">
              <p class="text-muted">
                Don't have an account? 
                <a href="/register">Sign up</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script>
    //   <?php if (session()->getFlashdata('pesan')) : ?>
    //     Swal.fire({
    //       title: "Success!",
    //       text: '<?= session()->getFlashdata('pesan'); ?>',
    //       icon: "success",
    //       confirmButtonColor: '#ff6f61'
    //     });
    //   <?php endif; ?>
    // </script>
  </body>
</html>
