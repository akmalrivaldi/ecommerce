<?= $this->extend('layouts/main_admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4 p-4" style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <div class="d-flex align-items-center mb-4">
        <i class="material-icons text-primary me-2" style="font-size: 36px;">inventory</i>
        <h3 class="text-primary m-0" style="font-weight: 600;">Kelola Produk</h3>
    </div>

    <!-- Filter Berdasarkan Kategori -->
    <form method="get" action="<?= site_url('admin/products') ?>" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-md-6 col-lg-4">
                <select name="category_id" class="form-select border border-primary p-2 rounded-3" style="height: 40px;">
                    <option value="">-- Semua Kategori --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id']; ?>" 
                            <?= isset($_GET['category_id']) && $_GET['category_id'] == $category['id'] ? 'selected' : '' ?>>
                            <?= $category['name_category']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3 col-lg-2 mt-4">
                <button type="submit" class="btn btn-primary w-100 p-2 rounded-3" style="height: 40px;">
                    <i class="material-icons align-middle me-1">filter_list</i> Filter
                </button>
            </div>
        </div>
    </form>

    <!-- Tombol Tambah Produk -->
    <div class="text-end mb-3">
        <a href="<?= base_url('admin/products/create') ?>" class="btn btn-success p-2 rounded-pill" style="height: 40px;">
            <i class="material-icons align-middle me-2">add_circle</i>Tambah Produk
        </a>
    </div>

    <!-- Tabel Produk -->
    <div class="table-responsive">
        <table class="table table-hover align-middle text-center">
            <thead style="background-color: #ffa726; color: white;">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Gambar</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="fw-bold"><?= $product['id']; ?></td>
                        <td><?= $product['name_product']; ?></td>
                        <td>
                            <img src="<?= base_url('uploads/products/' . $product['image']); ?>" 
                                 alt="Foto Produk" 
                                 width="80" 
                                 style="border-radius: 5px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                        </td>
                        <td><?= $product['name_category']; ?></td>
                        <td>Rp<?= number_format($product['price'], 0, ',', '.'); ?></td>
                        <td><?= $product['stock']; ?></td>
                        <td>
                            <a href="<?= site_url('admin/products/edit/' . $product['id']); ?>" 
                               class="btn btn-sm btn-warning rounded-pill">
                                <i class="material-icons align-middle">edit</i>Edit
                            </a>
                            <a href="<?= site_url('admin/products/delete/' . $product['id']); ?>" 
                               class="btn btn-sm btn-danger rounded-pill" 
                               onclick="return confirm('Hapus produk ini?')">
                                <i class="material-icons align-middle">delete</i>Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    <?php if (session()->getFlashdata('pesan')) : ?>
        Swal.fire({
            title: "Berhasil!",
            text: '<?= session()->getFlashdata('pesan'); ?>',
            icon: "success"
        });
    <?php endif; ?>
</script>

<?= $this->endSection() ?>
