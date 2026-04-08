<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Tambah Tanggapan</h3>

    <form action="<?= base_url('tanggapan/store') ?>" method="post">

        <div class="mb-3">
            <label>Pengaduan</label>
            <select name="id_pengaduan" class="form-control" required>
                <?php foreach($pengaduan as $p): ?>
                    <option value="<?= $p['id_pengaduan'] ?>">
                        <?= $p['judul'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Isi Tanggapan</label>
            <textarea name="isi_tanggapan" class="form-control" required></textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="<?= base_url('tanggapan') ?>" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?= $this->endSection() ?>