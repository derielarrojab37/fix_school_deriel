<!DOCTYPE html>
<html>
<head>
    <title>Tambah Tanggapan</title>
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>Tambah Tanggapan</h3>

    <form action="/tanggapan/store" method="post">
        <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan ?>">

        <div class="mb-3">
            <label>Isi Tanggapan</label>
            <textarea name="isi_tanggapan" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Kirim</button>
    </form>
</div>

</body>
</html>