<?= $this->extend('layouts/main_admin') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3>Laporan orders</h3>
     <!-- Tabel Produk -->
    <table class="table table-bordered table-hover text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Total</th>
                <th>Payment Method</th>
                <!-- <th>Aksi</th> -->
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
          title: "berhasil!",
          text: '<?= session()->getFlashdata('pesan'); ?>',
          icon: "success"
          });
      <?php endif; ?>
      </script>
<?= $this->endSection() ?>
