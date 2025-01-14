<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #ff6600;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .btn-warning {
            background-color: #ff6600;
            border-color: #ff6600;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }

        .card {
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #ff6600;
            color: white;
            font-size: 1.1rem;
            font-weight: bold;
        }

        .badge {
            font-size: 0.9rem;
        }

        .badge-success {
            background-color: #28a745;
        }

        .badge-danger {
            background-color: #dc3545;
        }

        ul {
            padding-left: 20px;
        }

        ul li {
            font-size: 1rem;
            line-height: 1.6;
        }

        .modal-content {
            border-radius: 8px;
        }

        .modal-header {
            background-color: #ff6600;
            color: white;
            font-weight: bold;
        }

        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
        }

        .btn-primary:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Status Pesanan</h2>
    <a class="btn btn-warning mb-3" href="<?= site_url('user/dashboard') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
    <?php if (empty($orders)): ?>
        <div class="alert alert-warning text-center">
            <strong><i class="fas fa-exclamation-circle"></i> Anda belum melakukan pesanan.</strong>
        </div>
    <?php else: ?>
        <?php foreach ($orders as $order): ?>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Pesanan ID: <?= $order['id'] ?></span>
                    <?php if ($order['payment_status'] === 'paid'): ?>
                        <span class="badge badge-success"><i class="fas fa-check-circle"></i> <?= ucfirst($order['payment_status']) ?></span>
                    <?php else: ?>
                        <span class="badge badge-danger"><i class="fas fa-times-circle"></i> <?= ucfirst($order['payment_status']) ?></span>
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
                            <i class="fas fa-money-bill-wave"></i> Bayar
                        </button>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<!-- Modal Pembayaran -->
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
    <?php if (session()->getFlashdata('pesan')) : ?>
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
