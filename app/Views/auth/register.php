<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title><?= $title; ?></title>
    
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f9f9f9;
        background-image: url('https://source.unsplash.com/1600x900/?shopping,store'); /* Gambar Latar */
        background-size: cover;
        background-position: center;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0;
      }

      .container {
        max-width: 900px;
        padding: 50px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 40px;
        transform: translateY(50px);
        animation: fadeInUp 0.8s ease-out forwards;
      }

      /* Animasi dan efek untuk judul Create Account */
      .card-header {
        background-color: #ff5722;
        color: white;
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        padding: 30px;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        text-transform: uppercase;
        letter-spacing: 2px;
        background: linear-gradient(45deg, #ff5722, #f44336, #e91e63);
        background-size: 400%;
        -webkit-background-clip: text;
        color: transparent;
        animation: gradientBackground 3s ease-in-out infinite, fadeInText 0.8s ease-in-out;
      }

      @keyframes gradientBackground {
        0% {
          background-position: 100% 0;
        }
        50% {
          background-position: 0 100%;
        }
        100% {
          background-position: 100% 0;
        }
      }

      @keyframes fadeInText {
        0% { opacity: 0; }
        100% { opacity: 1; }
      }

      .form-control {
        border-radius: 20px;
        height: 50px;
        font-size: 1rem;
        padding: 12px 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
      }

      .form-control:focus {
        box-shadow: 0 0 10px rgba(255, 87, 34, 0.5);
        border-color: #ff5722;
      }

      .btn-primary {
        width: 100%;
        padding: 15px;
        border-radius: 20px;
        font-size: 1.2rem;
        font-weight: bold;
        background-color: #ff5722;
        border: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #e64a19;
        transform: translateY(-5px);
      }

      .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
      }

      .logo {
        max-width: 200px;
        display: block;
        margin: 0 auto;
        animation: slideInRight 0.8s ease-out;
      }

      /* Animations */
      @keyframes fadeIn {
        0% { opacity: 0; }
        100% { opacity: 1; }
      }

      @keyframes fadeInUp {
        0% { opacity: 0; transform: translateY(50px); }
        100% { opacity: 1; transform: translateY(0); }
      }

      @keyframes slideInRight {
        0% { transform: translateX(100%); }
        100% { transform: translateX(0); }
      }

      /* Responsiveness */
      @media (max-width: 768px) {
        .container {
          flex-direction: column;
          padding: 20px;
        }
      }
    </style>
  </head>
  <body>

    <div class="container">
      <div class="form-container">
        <!-- Left side (form area) -->
        <div class="form-area">
          <div class="card-header">
            Create Account
          </div>
          <div class="card-body">
            <form action="/register/process" method="post">
              <?= csrf_field() ?>
              
              <!-- Username Field -->
              <div class="mb-3">
                <label for="name_user" class="form-label">Username</label>
                <input
                  type="text"
                  class="form-control"
                  id="name_user"
                  name="name_user"
                  placeholder="Input your username..."
                  autocomplete="off"
                  required
                />
              </div>
              
              <!-- Email Field -->
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                  type="email"
                  name="email"
                  class="form-control"
                  id="email"
                  placeholder="Input your email..."
                  autocomplete="off"
                  required
                />
              </div>
              
              <!-- Password Field -->
              <div class="mb-3">
                <label for="password" class="form-label">Input Password</label>
                <input
                  type="password"
                  name="password"
                  class="form-control"
                  id="password"
                  placeholder="Input your password..."
                  autocomplete="off"
                  required
                />
              </div>
              
              <!-- Register Button -->
              <button type="submit" name="register" class="btn btn-primary">Register</button>
            </form>
          </div>
        </div>

        <!-- Right side (image/logo area) -->
        <div class="image-area">
          <img src="/public/material-dashboard-master/assets/img/pngwing.com (9).png" alt="" class="logo" />
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
