<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<h3>Tugaskan Teknisi</h3>

<form action="<?= base_url('penugasan/store') ?>" method="post">
    <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan ?>">

    <div class="mb-3">
        <label>Pilih Teknisi</label>
        <select name="id_teknisi" class="form-control" required>
            <option value="">-- Pilih Teknisi --</option>
            <?php foreach ($teknisi as $t): ?>
                <option value="<?= $t['id_user'] ?>">
                    <?= $t['nama'] ?>
                </option>
            <?php endforeach ?>
        </select>
    </div>

    <button class="btn btn-success">Tugaskan</button>
</form>

<?= $this->endSection() ?>