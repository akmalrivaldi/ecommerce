<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Custom Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: all 0.3s ease;
        }

        h2 {
            color: #ff6600;
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-warning {
            color: #fff;
            background-color: #ff6600;
            border-color: #ff6600;
        }

        .btn-warning:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }

        .table {
            font-size: 1.1rem;
        }

        .table thead {
            background-color: #ff6600;
            color: white;
        }

        .table tbody tr:hover {
            background-color: #f2f2f2;
            transition: background-color 0.3s ease;
        }

        .form-control {
            border-radius: 5px;
            padding: 10px;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        /* Add animation on table row */
        .quantity-input {
            transition: transform 0.3s ease-in-out;
        }

        .quantity-input:focus {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2>Keranjang Belanja</h2>
    <a class="btn btn-warning mb-2" href="<?= site_url('user/dashboard') ?>">Kembali</a>
    
    <?php if (empty($cartItems)): ?>
        <p>Keranjang Anda kosong.</p>
    <?php else: ?>
        <form action="<?= base_url('cart/checkout') ?>" method="post" id="checkoutForm">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Pilih</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $item): ?>
                        <tr>
                            <td>
                                <input type="checkbox" name="selected_items[]" value="<?= $item['id'] ?>" class="checkbox-item">
                            </td>
                            <td><?= $item['product_name'] ?></td>
                            <td>Rp <?= number_format($item['product_price'], 0, ',', '.') ?></td>
                            <td>
                                <input 
                                    type="number" 
                                    class="form-control quantity-input" 
                                    data-id="<?= $item['id'] ?>" 
                                    data-price="<?= $item['product_price'] ?>" 
                                    value="<?= $item['quantity'] ?>" 
                                    min="1">
                            </td>
                            <td id="total-<?= $item['id'] ?>">Rp <?= number_format($item['quantity'] * $item['product_price'], 0, ',', '.') ?></td>
                            <td>
                                <a href="<?= base_url('cart/delete/' . $item['id']) ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Checkout</button>
        </form>
    <?php endif; ?>
</div>

<script>
    // Handle quantity change
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function () {
            const cartId = this.dataset.id;
            const price = parseFloat(this.dataset.price);
            const quantity = parseInt(this.value);

            // Update total for the row
            const totalCell = document.getElementById(`total-${cartId}`);
            totalCell.textContent = 'Rp ' + (price * quantity).toLocaleString('id-ID');

            // Send AJAX request to update quantity in the database
            fetch('<?= base_url('cart/updateQuantity') ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: JSON.stringify({ cart_id: cartId, quantity: quantity })
            }).then(response => response.json())
              .then(data => {
                  if (data.success) {
                      console.log('Quantity updated successfully');
                  } else {
                      alert('Gagal memperbarui jumlah. Silakan coba lagi.');
                  }
              });
        });
    });

    // Validate checkout form
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        const selectedItems = document.querySelectorAll('.checkbox-item:checked');
        
        // Create an array to hold the selected items
        const selectedItemsArray = [];
        selectedItems.forEach(item => {
            selectedItemsArray.push(item.value);  // Store the product IDs
        });
        
        // If no items are selected, prevent form submission
        if (selectedItemsArray.length === 0) {
            e.preventDefault();
            Swal.fire({
                title: 'Peringatan!',
                text: 'Pilih produk terlebih dahulu sebelum checkout.',
                icon: 'warning',
            });
        } else {
            // Update the hidden input field with the selected items
            document.getElementById('selected_items_input').value = selectedItemsArray.join(',');
        }
    });
</script>

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
