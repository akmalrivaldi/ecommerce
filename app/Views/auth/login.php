<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= $title; ?></title>
  </head>
  <body>
  <div class="container">
  <div class="row text-center mb-1 pt-5 mt-5">
          <div class="col">
          <!-- <img class="img1"> -->
            <h2>Log-in</h2>
          </div>
        </div>
  <div class="row justify-content-center pb-3 mt-1">
          <div class="col-md-4">
            <form action="/login/process" method="post" >
            <?= csrf_field() ?>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="input email..."
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input
                  autocomplete="off"
                  type="password"
                  name="password"
                  placeholder="input password..."
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3" >
              <!-- <input class="form-check-input" name="remember" type="checkbox" value="" id="remember">
              <label class="form-check-label" for="remember" name="remember"> -->
              </label>
              </div>
              <a href="/register" class="d-block my-3">Register</a>
              <button type="submit" name="login" class="btn btn-success px-6">Log-in</button>
            </form>
          </div>
        </div>
  </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script>
        <?php if(session()->getFlashdata('pesan')) :?>
          Swal.fire({
          title: "berhasil!",
          text: '<?= session()->getFlashdata('pesan'); ?>',
          icon: "success"
          });
      <?php endif; ?>
      </script>
  </body>
</html>
