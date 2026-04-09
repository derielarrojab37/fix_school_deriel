<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .edit-card {
        background: #ffffff;
        border-radius: 24px;
        border: none;
        box-shadow: 0 15px 35px rgba(112, 144, 176, 0.1);
        overflow: hidden;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateX(-20px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .edit-header {
        background: linear-gradient(135deg, #4361ee 0%, #2ccce4 100%);
        padding: 30px;
        color: white;
    }

    .form-label {
        font-weight: 700;
        color: #2b3674;
        font-size: 0.9rem;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .form-label i {
        margin-right: 10px;
        color: #4361ee;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 12px 18px;
        border: 1px solid #e0e5f2;
        background-color: #f8fafe;
        color: #2b3674;
        transition: all 0.3s;
    }

    .form-control:focus {
        background-color: #fff;
        border-color: #4361ee;
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }

    .btn-update {
        background: #4361ee;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
    }

    .btn-update:hover {
        background: #3a0ca3;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.2);
    }

    .info-tag {
        font-size: 0.75rem;
        background: #eef2ff;
        color: #4361ee;
        padding: 4px 12px;
        border-radius: 20px;
        font-weight: 600;
        margin-left: 10px;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="edit-card">
                <div class="edit-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-3 p-3 me-3">
                            <i class="bi bi-pencil-square fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">Edit Tanggapan</h4>
                            <p class="mb-0 opacity-75 small">Perbarui informasi atau koreksi tanggapan sebelumnya</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="<?= base_url('tanggapan/update/'.$tanggapan['id_tanggapan']) ?>" method="post">
                        <?= csrf_field(); ?>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-file-earmark-text"></i> Terkait Laporan
                                <span class="info-tag">Referensi</span>
                            </label>
                            <select name="id_pengaduan" class="form-select" required>
                                <?php foreach($pengaduan as $p): ?>
                                    <option value="<?= $p['id_pengaduan'] ?>"
                                        <?= $p['id_pengaduan'] == $tanggapan['id_pengaduan'] ? 'selected' : '' ?>>
                                        [ID: #PGN-<?= $p['id_pengaduan'] ?>] <?= $p['judul'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-chat-left-dots"></i> Isi Tanggapan Terbaru
                            </label>
                            <textarea name="isi_tanggapan" class="form-control" rows="8" required placeholder="Tulis revisi tanggapan di sini..."><?= trim($tanggapan['isi_tanggapan']) ?></textarea>
                            <div class="form-text mt-2 text-muted small">
                                <i class="bi bi-info-circle me-1"></i> Perubahan ini akan langsung terlihat di halaman detail pengaduan user.
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-4">
                            <a href="<?= base_url('tanggapan') ?>" class="text-muted text-decoration-none fw-bold small">
                                <i class="bi bi-x-circle me-1"></i> Batalkan Perubahan
                            </a>
                            <button type="submit" class="btn btn-update">
                                Simpan Perubahan <i class="bi bi-check2-all ms-2"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="mt-4 p-3 bg-light rounded-4 border-0 text-center">
                <small class="text-muted">
                    Terakhir diperbarui pada: <b><?= date('d M Y, H:i', strtotime($tanggapan['tanggal'])) ?></b>
                </small>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>