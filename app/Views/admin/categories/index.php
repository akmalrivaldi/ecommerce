<?= $this->extend('layouts/main_admin') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Daftar Kategori</h3>
    <a href="<?= base_url('admin/categories/create') ?>" class="btn btn-primary mb-2">Tambah Kategori</a>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category['id'] ?></td>
                    <td><?= $category['name_category'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/categories/edit/'.$category['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/categories/delete/'.$category['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
