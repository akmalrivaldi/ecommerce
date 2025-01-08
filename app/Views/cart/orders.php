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

</html>
<div class="container mt-5">
    <h2>Status Pesanan</h2>
    <a class="btn btn-warning mb-2" href="<?= site_url('user/dashboard') ?>">kembali</a>
    <?php if (empty($orders)): ?>
        <p>Anda belum melakukan pesanan.</p>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            <div class="card mb-3">
                <div class="card-header">
                    <strong>Pesanan ID: <?= $order['id'] ?></strong>
                    <?php if ($order['payment_status'] === 'paid'): ?>
                        <span class="badge bg-success"><?= ucfirst($order['payment_status']) ?></span>
                    <?php endif; ?>
                    <?php if ($order['payment_status'] === 'unpaid'): ?>
                        <span class="badge bg-danger"><?= ucfirst($order['payment_status']) ?></span>
                        <?php endif; ?>
                </div>
                <div class="card-body">
                    <p><strong>Total: </strong>Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></p>
                    <h5>Detail Pesanan:</h5>
                    <ul>
                        <?php foreach ($order['details'] as $detail): ?>
                            <li>
                                <?= $detail['product_name'] ?> (<?= $detail['quantity'] ?> x Rp <?= number_format($detail['price'], 0, ',', '.') ?>)
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?php if ($order['payment_status'] === 'unpaid'): ?>
                        <button class="btn btn-success btn-sm" 
                                onclick="showPaymentModal(<?= $order['id'] ?>, <?= $order['total_amount'] ?>)">
                            Bayar
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<!-- Pop-up Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="paymentForm" action="<?= base_url('cart/orders/pay') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Metode Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="order_id" id="order_id">
                    <p><strong>Total Pembayaran:</strong> Rp <span id="total_amount"></span></p>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Pilih Metode Pembayaran:</label>
                        <select class="form-select" name="payment_method" id="payment_method" required>
                            <option value="">-- Pilih Metode Pembayaran --</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="ewallet">E-Wallet</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function showPaymentModal(orderId, totalAmount) {
        document.getElementById('order_id').value = orderId;
        document.getElementById('total_amount').textContent = totalAmount.toLocaleString();
        new bootstrap.Modal(document.getElementById('paymentModal')).show();
    }
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

