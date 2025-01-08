<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Update Profile</h2>
    <form action="/profile/update" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        
        <!-- Input Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control" 
                value="<?= isset($user['email']) ? esc($user['email']) : '' ?>" 
                readonly
            >
        </div>

        <!-- Input Nama -->
        <div class="mb-3">
            <label for="user_name" class="form-label">Nama</label>
            <input 
                type="text" 
                name="user_name" 
                id="user_name" 
                class="form-control" 
                value="<?= isset($profile['user_name']) ? esc($profile['user_name']) : '' ?>" 
            >
        </div>

        <!-- Input No HP -->
        <div class="mb-3">
            <label for="phone_number" class="form-label">No. HP</label>
            <input 
                type="text" 
                name="phone_number" 
                id="phone_number" 
                class="form-control" 
                value="<?= isset($profile['phone_number']) ? esc($profile['phone_number']) : '' ?>" 
            >
        </div>

        <!-- Input Alamat -->
        <div class="mb-3">
            <label for="addres" class="form-label">Alamat</label>
            <textarea 
                name="addres" 
                id="addres" 
                class="form-control"
            ><?= isset($profile['addres']) ? esc($profile['addres']) : '' ?></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>