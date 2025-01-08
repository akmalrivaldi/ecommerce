<?= $this->extend('layouts/main_admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Tambah Produk</h3>
    <form method="post" action="<?= base_url('admin/products/store') ?>" enctype="multipart/form-data">
    <?= csrf_field() ?>
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name_product" class="form-control border border-primary p-2" autofocus required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control border border-primary p-2" required></textarea>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control border border-primary p-2" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stock" class="form-control border border-primary p-2"required>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="category_id" class="form-control border border-primary p-2">
            <option value="" disabled>Pilih Kategori</option>
            <option value=""></option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?= $category['id'] ?>"><?= $category['name_category'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
        <label for="image" class="form-label">Foto Produk</label>
        <input type="file" class="form-control border border-primary p-2" id="image" name="image" accept="image/*">
    </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>

<?= $this->endSection() ?>
