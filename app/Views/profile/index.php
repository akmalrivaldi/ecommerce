<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Custom Styling for Form */
        body {
            background-color: #f7f7f7;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #ff6600; /* Orange color for labels */
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
            font-size: 1rem;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 5px;
            background-color: #ff6600; /* Orange button color */
            border: none;
        }

        .btn-primary:hover {
            background-color: #e65c00; /* Darker orange on hover */
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(255, 102, 0, 0.5); /* Orange focus border */
        }

        .fa {
            margin-right: 10px;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .container {
                padding: 20px;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h2 class="text-center mb-4" style="color: #ff6600;"><i class="fas fa-user-edit"></i> Update Profile</h2>

    <form action="/profile/update" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- Input Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email <i class="fas fa-envelope"></i></label>
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
            <label for="user_name" class="form-label">Nama <i class="fas fa-user"></i></label>
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
            <label for="phone_number" class="form-label">No. HP <i class="fas fa-phone-alt"></i></label>
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
            <label for="addres" class="form-label">Alamat <i class="fas fa-home"></i></label>
            <textarea 
                name="addres" 
                id="addres" 
                class="form-control"
            ><?= isset($profile['addres']) ? esc($profile['addres']) : '' ?></textarea>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Update
        </button>
    </form>
</div>

<script>
    <?php if(session()->getFlashdata('pesan')) :?>
        Swal.fire({
            title: "Berhasil!",
            text: '<?= session()->getFlashdata('pesan'); ?>',
            icon: "success"
        });
    <?php endif; ?>
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
