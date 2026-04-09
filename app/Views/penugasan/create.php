<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .assign-card {
        background: #ffffff;
        border-radius: 24px;
        border: none;
        box-shadow: 0 15px 35px rgba(112, 144, 176, 0.1);
        overflow: hidden;
        animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .assign-header {
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        padding: 35px;
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
        font-size: 1.1rem;
        color: var(--primary-color);
    }

    .form-select, .form-control {
        border-radius: 12px;
        padding: 12px 18px;
        border: 1px solid #e0e5f2;
        background-color: #f8fafe;
        color: #2b3674;
        transition: all 0.3s;
    }

    .form-select:focus, .form-control:focus {
        background-color: #fff;
        border-color: #2575fc;
        box-shadow: 0 0 0 4px rgba(37, 117, 252, 0.1);
    }

    .info-box {
        background: #f4f7fe;
        border-radius: 16px;
        padding: 20px;
        border-left: 5px solid #2575fc;
        margin-bottom: 30px;
    }

    .btn-assign {
        background: linear-gradient(135deg, #2575fc, #6a11cb);
        border: none;
        padding: 14px 40px;
        border-radius: 12px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
        box-shadow: 0 10px 20px rgba(37, 117, 252, 0.2);
    }

    .btn-assign:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(37, 117, 252, 0.4);
        filter: brightness(1.1);
    }

    .instruction-step {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .step-number {
        width: 28px;
        height: 28px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        font-weight: bold;
        margin-right: 12px;
    }
</style>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="assign-card">
                <div class="assign-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                            <i class="bi bi-person-plus-fill fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">Delegasikan Penugasan</h4>
                            <p class="mb-0 opacity-75 small">Tentukan teknisi yang tepat untuk menangani laporan ini</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <div class="info-box">
                        <h6 class="fw-bold mb-2"><i class="bi bi-info-circle-fill me-2 text-primary"></i>Panduan Delegasi</h6>
                        <div class="instruction-step">
                            <div class="step-number">1</div>
                            <span class="small text-muted">Pilih laporan yang masuk dari daftar pengaduan.</span>
                        </div>
                        <div class="instruction-step">
                            <div class="step-number">2</div>
                            <span class="small text-muted">Pilih teknisi yang tersedia atau sesuai dengan bidangnya.</span>
                        </div>
                    </div>

                    <form action="<?= base_url('penugasan/store') ?>" method="post">
                        
                        <div class="mb-4">
                            <label class="form-label"><i class="bi bi-file-earmark-text"></i> Pilih Laporan Pengaduan</label>
                            <select name="id_pengaduan" class="form-select" required>
                                <option value="" selected disabled>-- Cari Laporan --</option>
                                <?php foreach ($pengaduan as $p): ?>
                                    <option value="<?= $p['id_pengaduan'] ?>">
                                        [<?= $p['lokasi'] ?>] - <?= $p['judul'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted mt-2 d-block">Laporan yang muncul adalah laporan yang belum diproses.</small>
                        </div>

                        <div class="mb-4">
    <label class="form-label"><i class="bi bi-tools"></i> Pilih Teknisi Lapangan</label>
    <select name="id_teknisi" class="form-select" required>
        <option value="" selected disabled>-- Cari Teknisi --</option>
        <?php foreach ($teknisi as $t): ?>
            <option value="<?= $t['id_user'] ?>">
                <?= $t['nama'] ?> (Status: Tersedia)
            </option>
        <?php endforeach; ?>
    </select>
</div>

                        <div class="mb-5">
                            <label class="form-label"><i class="bi bi-calendar-check"></i> Tanggal Penugasan</label>
                            <input type="date" name="tgl_penugasan" class="form-control" value="<?= date('Y-m-d') ?>" required>
                        </div>

                        <div class="d-flex justify-content-between align-items-center border-top pt-4">
                            <a href="<?= base_url('penugasan') ?>" class="text-muted text-decoration-none fw-semibold">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-assign">
                                Konfirmasi Penugasan <i class="bi bi-check-circle-fill ms-2"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>