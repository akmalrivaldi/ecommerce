
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= $title; ?></title>
  </head>
  <body>

  <div class="container">
  <div class="row text-center mb-1 pt-5 mt-5">
          <div class="col">
            <h2>Register</h2>
          </div>
        </div>
  <div class="row justify-content-center pb-3 mt-1">
          <div class="col-md-4">
            <form action="/register/process" method="post" >
              <div class="mb-3">
                <label for="name_user" class="form-label">username</label>
                <input
                  autocomplete="off"
                  type="text"
                  class="form-control"
                  id="name_user"
                  name="name_user"
                  placeholder="input username..."
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input
                  autocomplete="off"
                  type="text"
                  name="email"
                  placeholder="input email..."
                  class="form-control"
                  id="email"
                  aria-describedby="emailHelp"
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Input password</label>
                <input
                  autocomplete="off"
                  type="password"
                  name="password"
                  placeholder="input password..."
                  class="form-control"
                  id="password"
                  aria-describedby="emailHelp"
                />
              </div>
              <button type="submit" name="register" class="btn btn-primary px-5 mx-auto">register</button>
            </form>
          </div>
        </div>
  </div>
 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
