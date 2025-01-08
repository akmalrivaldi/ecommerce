<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Keranjang Belanja</h2>
    <a class="btn btn-warning mb-2" href="<?= site_url('user/dashboard') ?>">kembali</a>
    <?php if (empty($cartItems)): ?>
        <p>Keranjang Anda kosong.</p>
    <?php else: ?>
        <form action="<?= base_url('cart/checkout') ?>" method="post">
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
                                <input type="checkbox" name="selected_items[]" value="<?= $item['id'] ?>">
                            </td>
                            <td><?= $item['product_name'] ?></td>
                            <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
                            <td>
                                <input 
                                    type="number" 
                                    class="form-control quantity-input" 
                                    data-id="<?= $item['id'] ?>" 
                                    data-price="<?= $item['price'] ?>" 
                                    value="<?= $item['quantity'] ?>" 
                                    min="1">
                            </td>
                            <td id="total-<?= $item['id'] ?>">Rp <?= number_format($item['quantity'] * $item['price'], 0, ',', '.') ?></td>
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
</script>
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