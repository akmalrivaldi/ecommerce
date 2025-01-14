<?= $this->extend('layouts/main_user') ?>

<?= $this->section('content') ?>
<div class="container py-5">
    <div class="row">
        <?php if (!empty($products)): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 rounded-lg">
                        <!-- Product Image -->
                        <div class="card-img-top overflow-hidden">
                         <img src="<?= base_url('uploads/products/' . $product['image']); ?>" 
                        class="img-fluid rounded-top" 
                        alt="<?= $product['name_product'] ?>" 
                         style="height: 250px; object-fit: cover; display: block; margin: 0 auto;">
                        </div>

                        <!-- Product Details -->
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold"><?= $product['name_product'] ?></h5>
                            <p class="card-text text-muted small"><?= $product['description'] ?></p>
                            <p class="card-text text-primary fw-bold">Rp <?= number_format($product['price'], 0, ',', '.') ?></p>
                        </div>

                        <!-- Add to Cart Button -->
                        <div class="card-footer bg-white text-center">
                            <form action="<?= route_to('cart.add'); ?>" method="post">
                                <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-outline-primary w-100 fw-bold">
                                    <a href="<?= route_to('cart.add'); ?>" class="btn btn-sm btn-primary rounded-pill w-100">
                            <i class="fa fa-cart-plus"></i> Tambah ke Keranjang
                        </a>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="text-muted">Produk tidak tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    <?php if(session()->getFlashdata('pesan')) : ?>
        Swal.fire({
            title: "Berhasil!",
            text: '<?= session()->getFlashdata('pesan'); ?>',
            icon: "success",
            confirmButtonColor: '#3085d6'
        });
    <?php endif; ?>
</script>
<?= $this->endSection() ?>
