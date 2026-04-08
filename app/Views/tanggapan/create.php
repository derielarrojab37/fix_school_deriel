<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3>Tambah Tanggapan</h3>

<form action="/tanggapan/store" method="post">
    <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan ?>">

    <div class="mb-3">
        <label>Isi Tanggapan</label>
        <textarea name="isi_tanggapan" class="form-control" required></textarea>
    </div>

    <button class="btn btn-success">Kirim</button>
</form>

<?= $this->endSection() ?>