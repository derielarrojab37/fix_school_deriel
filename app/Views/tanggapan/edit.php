<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Edit Tanggapan</h3>

    <form action="<?= base_url('tanggapan/update/'.$tanggapan['id_tanggapan']) ?>" method="post">

        <div class="mb-3">
            <label>Pengaduan</label>
            <select name="id_pengaduan" class="form-control" required>
                <?php foreach($pengaduan as $p): ?>
                    <option value="<?= $p['id_pengaduan'] ?>"
                        <?= $p['id_pengaduan'] == $tanggapan['id_pengaduan'] ? 'selected' : '' ?>>
                        <?= $p['judul'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Isi Tanggapan</label>
            <textarea name="isi_tanggapan" class="form-control" required>
                <?= $tanggapan['isi_tanggapan'] ?>
            </textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="<?= base_url('tanggapan') ?>" class="btn btn-secondary">Kembali</a>

    </form>
</div>

<?= $this->endSection() ?>