<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3>Data Penugasan</h3>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Pengaduan</th>
        <th>Teknisi</th>
        <th>Status</th>
    </tr>

    <?php $no=1; foreach ($penugasan as $p): ?>
    <tr>
        <td><?= $no++ ?></td>
        <td><?= $p['judul'] ?></td>
        <td><?= $p['teknisi'] ?></td>
        <td><?= $p['status_tugas'] ?></td>
    </tr>
    <?php endforeach ?>
</table>

<?= $this->endSection() ?>