<!DOCTYPE html>
<html>
<head>
    <title>Data Tanggapan</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>Data Tanggapan</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengaduan</th>
                <th>User</th>
                <th>Isi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $no = 1; foreach ($tanggapan as $t) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $t['judul'] ?></td>
                <td><?= $t['nama'] ?></td>
                <td><?= $t['isi_tanggapan'] ?></td>
                <td><?= $t['tanggal'] ?></td>
                <td>
                    <a href="/tanggapan/delete/<?= $t['id_tanggapan'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>

</body>
</html>