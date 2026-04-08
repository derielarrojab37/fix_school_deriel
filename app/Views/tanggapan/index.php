<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3 class="mb-3">Data Tanggapan</h3>

    <a href="<?= base_url('tanggapan/create') ?>" class="btn btn-primary mb-3">
        + Tambah Tanggapan
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Pengaduan</th>
                <th>User</th>
                <th>Isi Tanggapan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($tanggapan as $t): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $t['id_pengaduan'] ?></td>
                <td><?= $t['id_user'] ?></td>
                <td><?= $t['isi_tanggapan'] ?></td>
                <td><?= $t['tanggal'] ?></td>
                <td>
                    <a href="<?= base_url('tanggapan/edit/'.$t['id_tanggapan']) ?>" class="btn btn-warning btn-sm">Edit</a>

                    <a href="<?= base_url('tanggapan/delete/'.$t['id_tanggapan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>