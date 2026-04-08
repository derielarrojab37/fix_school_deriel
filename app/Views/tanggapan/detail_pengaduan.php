<h4>Tanggapan</h4>

<form action="<?= base_url('tanggapan/store') ?>" method="post">
    <input type="hidden" name="id_pengaduan" value="<?= $pengaduan['id_pengaduan'] ?>">

    <div class="mb-3">
        <textarea name="isi_tanggapan" class="form-control" placeholder="Tulis tanggapan..." required></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Kirim Tanggapan</button>
</form>
<h5>Daftar Tanggapan:</h5>

<?php foreach ($tanggapan as $t) : ?>
    <div class="card mb-2">
        <div class="card-body">
            <b><?= $t['nama'] ?></b><br>
            <small><?= $t['tanggal'] ?></small>
            <p><?= $t['isi_tanggapan'] ?></p>
        </div>
    </div>
<?php endforeach; ?>