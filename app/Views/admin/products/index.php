<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-3">
    <h3>Kelola Produk</h3>

    <!-- Filter Berdasarkan Kategori -->
    <form method="get" action="<?= site_url('admin/products') ?>" class="mb-2">
        <div class="row">
            <div class="col-md-4">
                <select name="category_id" class="form-control border border-primary p-2">
                    <option value="">-- Semua Kategori --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id']; ?>" 
                            <?= isset($_GET['category_id']) && $_GET['category_id'] == $category['id'] ? 'selected' : '' ?>>
                            <?= $category['name_category']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </div>
    </form>

    <!-- Tabel Produk -->
    <table class="table table-bordered table-hover text-center">
    <a href="<?= base_url('admin/products/create') ?>" class="btn btn-primary mb-2">Tambah Produk</a>
        <thead>
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
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['name_product']; ?></td>
                    <td>
                    <img src="<?= base_url('uploads/products/' . $product['image']); ?>" alt="Foto Produk" width="150">
                    </td>
                    <td><?= $product['name_category']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['stock']; ?></td>
                    <td>
                        <a href="<?= site_url('admin/products/edit/' . $product['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= site_url('admin/products/delete/' . $product['id']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus produk ini?')">Hapus</a>
                    </td>
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
