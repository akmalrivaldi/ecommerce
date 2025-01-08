<?= $this->extend('layouts/main_user') ?>

<?= $this->section('content') ?>
<div class="row">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="<?= base_url('uploads/products/' . $product['image']); ?>" class="card-img-top" alt="<?= $product['name_product'] ?>" width="100">
                    <div class="card-body">
                        <h5 class="card-title"><?= $product['name_product'] ?></h5>
                        <p class="card-text"><?= $product['description'] ?></p>
                        <p class="card-text"><b>Rp <?= number_format($product['price'], 0, ',', '.') ?></b></p>
                        <form action="<?= route_to('cart.add'); ?>" method="post">
                            <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-primary">Tambah ke Keranjang</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No products available.</p>
    <?php endif; ?>
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
