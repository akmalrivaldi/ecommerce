<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Daftar User</h3>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name_user'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/users/delete/'.$user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
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
