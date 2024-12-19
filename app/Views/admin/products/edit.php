<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Edit Produk</h3>
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin/products/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- Nama Produk -->
                <div class="mb-3">
                    <label for="name_product" class="form-label">Nama Produk</label>
                    <input type="text" name="name_product" id="name_product" class="form-control border border-primary p-2" value="<?= $product['name_product'] ?>" required>
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control border border-primary p-2" rows="4" required><?= $product['description'] ?></textarea>
                </div>

                <!-- Harga -->
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price" class="form-control border border-primary p-2" value="<?= $product['price'] ?>" required>
                </div>

                <!-- Stok -->
                <div class="mb-3">
                    <label for="stock" class="form-label">Stok</label>
                    <input type="number" name="stock" id="stock" class="form-control border border-primary p-2" value="<?= $product['stock'] ?>" required>
                </div>

                <!-- Kategori -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Kategori</label>
                    <select name="category_id" id="category_id" class="form-select border border-primary p-2" required>
                        <option value="" disabled>Pilih Kategori</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= $category['id'] ?>" <?= $category['id'] == $product['category_id'] ? 'selected' : '' ?>>
                                <?= $category['name_category'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Foto Produk</label><br>
                    <img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="Foto Produk" width="100"><br><br>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>

                <!-- Tombol Submit -->
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                    <a href="<?= base_url('admin/products') ?>" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
