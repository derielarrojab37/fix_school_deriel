<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3>Tambah Pengaduan</h3>

<form action="<?= base_url('pengaduan/store') ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul" required>
    <textarea name="deskripsi" class="form-control mb-2" placeholder="Deskripsi" required></textarea>
    <input type="text" name="lokasi" class="form-control mb-2" placeholder="Lokasi">
    <input type="file" name="foto" class="form-control mb-2">

    <button class="btn btn-success">Kirim</button>
</form>

<?= $this->endSection() ?>