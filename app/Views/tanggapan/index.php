<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3>Data Tanggapan</h3>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pengaduan</th>
        <th>User</th>
        <th>Isi</th>
        <th>Tanggal</th>
    </tr>

    <?php $no=1; foreach ($tanggapan as $t): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $t['judul'] ?></td>
        <td><?= $t['nama'] ?></td>
        <td><?= $t['isi_tanggapan'] ?></td>
        <td><?= $t['tanggal'] ?></td>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>