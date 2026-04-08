<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3>Data Pengaduan</h3>

<a href="<?= base_url('pengaduan/create') ?>" class="btn btn-primary mb-3">+ Tambah</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>User</th>
        <th>Lokasi</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php $no=1; foreach ($pengaduan as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p['judul'] ?></td>
        <td><?= $p['nama'] ?></td>
        <td><?= $p['lokasi'] ?></td>
        <td><?= $p['status'] ?></td>
        <td>
           <a href="<?= base_url('pengaduan/detail/' . $p['id_pengaduan']) ?>" class="btn btn-info btn-sm">Detail</a>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>