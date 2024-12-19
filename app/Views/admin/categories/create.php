<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Tambah kategori</h3>
    <form method="post" action="<?= base_url('admin/categories/store') ?>">
    <?= csrf_field() ?>
        <div class="mb-3">
            <label>Nama Kategori</label>
            <input type="text" name="name_category" class="form-control border border-primary p-2" required>
        <button type="submit" class="btn btn-success mt-2">Simpan</button>
    </form>
</div>

<?= $this->endSection() ?>
