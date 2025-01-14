<?= $this->extend('layouts/main_admin') ?>
<?= $this->section('content') ?>

<div class="container mt-5 p-4" style="background-color: #fff; border-radius: 10px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
    <div class="d-flex align-items-center mb-4">
        <i class="material-icons text-primary me-2" style="font-size: 36px;">add_circle</i>
        <h3 class="text-primary m-0" style="font-weight: 600;">Tambah Produk</h3>
    </div>
    <form method="post" action="<?= base_url('admin/products/store') ?>" enctype="multipart/form-data">
        <?= csrf_field() ?>

        <!-- Nama Produk -->
        <div class="row mb-3">
            <label class="form-label text-secondary col-sm-2" style="font-weight: 500;">Nama Produk</label>
            <div class="col-sm-10">
                <input 
                    type="text" 
                    name="name_product" 
                    class="form-control border border-primary p-3 rounded-3 shadow-sm" 
                    placeholder="Masukkan nama produk" 
                    autofocus 
                    required>
            </div>
        </div>

        <!-- Deskripsi -->
        <div class="row mb-3">
            <label class="form-label text-secondary col-sm-2" style="font-weight: 500;">Deskripsi</label>
            <div class="col-sm-10">
                <textarea 
                    name="description" 
                    class="form-control border border-primary p-3 rounded-3 shadow-sm" 
                    placeholder="Deskripsikan produk secara singkat" 
                    rows="4" 
                    required></textarea>
            </div>
        </div>

        <!-- Harga -->
        <div class="row mb-3">
            <label class="form-label text-secondary col-sm-2" style="font-weight: 500;">Harga</label>
            <div class="col-sm-10">
                <input 
                    type="number" 
                    name="price" 
                    class="form-control border border-primary p-3 rounded-3 shadow-sm" 
                    placeholder="Masukkan harga produk" 
                    required>
            </div>
        </div>

        <!-- Stok -->
        <div class="row mb-3">
            <label class="form-label text-secondary col-sm-2" style="font-weight: 500;">Stok</label>
            <div class="col-sm-10">
                <input 
                    type="number" 
                    name="stock" 
                    class="form-control border border-primary p-3 rounded-3 shadow-sm" 
                    placeholder="Masukkan jumlah stok produk" 
                    required>
            </div>
        </div>

        <!-- Kategori -->
        <div class="row mb-3">
            <label class="form-label text-secondary col-sm-2" style="font-weight: 500;">Kategori</label>
            <div class="col-sm-10">
                <select 
                    name="category_id" 
                    class="form-select border border-primary p-3 rounded-3 shadow-sm" 
                    required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name_category'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Foto Produk -->
        <div class="row mb-3">
            <label for="image" class="form-label text-secondary col-sm-2" style="font-weight: 500;">Foto Produk</label>
            <div class="col-sm-10">
                <input 
                    type="file" 
                    class="form-control border border-primary p-3 rounded-3 shadow-sm" 
                    id="image" 
                    name="image" 
                    accept="image/*">
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="text-center mt-4">
            <button 
                type="submit" 
                class="btn btn-primary px-5 py-3 rounded-pill shadow-sm" 
                style="font-weight: 600;">
                <i class="material-icons align-middle me-2">save</i>Simpan
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
