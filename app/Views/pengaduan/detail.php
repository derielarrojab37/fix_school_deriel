<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3><?= $pengaduan['judul'] ?></h3>
<p><?= $pengaduan['deskripsi'] ?></p>

<hr>

<h5>Tanggapan</h5>

<?php foreach ($tanggapan as $t): ?>
    <div class="card mb-2">
        <div class="card-body">
            <b><?= $t['nama'] ?></b><br>
            <?= $t['isi_tanggapan'] ?>
        </div>
    </div>
<?php endforeach ?>

<hr>

<a href="/tanggapan/create/<?= $pengaduan['id_pengaduan'] ?>" class="btn btn-primary">
    + Tanggapi
</a>

<?= $this->endSection() ?>