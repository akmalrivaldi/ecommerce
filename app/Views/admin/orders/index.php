<?= $this->extend('layouts/main_admin') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3 class="text-center text-warning">Laporan Orders</h3>
    
    <!-- Tabel Produk -->
    <table class="table table-bordered table-hover text-center">
        <thead class="bg-warning text-white">
            <tr>
                <th><i class="fas fa-id-badge"></i> ID</th>
                <th><i class="fas fa-user"></i> User ID</th>
                <th><i class="fas fa-calendar-alt"></i> Order Date</th>
                <th><i class="fas fa-check-circle"></i> Status</th>
                <th><i class="fas fa-money-bill-wave"></i> Total</th>
                <th><i class="fas fa-credit-card"></i> Payment Method</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= $order['id']; ?></td>
                    <td><?= $order['user_id']; ?></td>
                    <td><?= $order['order_date']; ?></td>
                    <td><?= $order['payment_status']; ?></td>
                    <td>Rp <?= number_format($order['total_amount'], 0, ',', '.') ?></td>
                    <td><?= $order['payment_method']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    <?php if(session()->getFlashdata('pesan')) :?>
      Swal.fire({
        title: "Berhasil!",
        text: '<?= session()->getFlashdata('pesan'); ?>',
        icon: "success",
        confirmButtonColor: '#ff6600'
      });
    <?php endif; ?>
</script>

<?= $this->endSection() ?>
