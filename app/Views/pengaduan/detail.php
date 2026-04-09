<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .report-detail-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(112, 144, 176, 0.08);
        overflow: hidden;
    }

    .status-banner {
        padding: 10px 20px;
        font-weight: 700;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: var(--bg-light);
        display: inline-block;
        border-radius: 10px;
        color: var(--primary-color);
        margin-bottom: 20px;
    }

    .report-title {
        color: var(--text-dark);
        font-weight: 800;
        font-size: 1.75rem;
        margin-bottom: 15px;
    }

    .report-meta {
        display: flex;
        gap: 20px;
        color: var(--text-muted);
        font-size: 0.9rem;
        margin-bottom: 25px;
        flex-wrap: wrap;
    }

    .report-description {
        line-height: 1.8;
        color: #4a5568;
        font-size: 1.05rem;
        background: #fcfdfe;
        padding: 20px;
        border-radius: 15px;
        border-left: 4px solid var(--primary-color);
    }

    /* Timeline Styling */
    .timeline-section {
        margin-top: 40px;
    }

    .timeline-title {
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .comment-card {
        border: none;
        border-radius: 15px;
        background: #ffffff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.03);
        margin-bottom: 15px;
        border-left: 3px solid #e0e5f2;
        transition: 0.3s;
    }

    .comment-card:hover {
        border-left-color: var(--primary-color);
        transform: translateX(5px);
    }

    .comment-user {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 0.9rem;
    }

    .comment-text {
        color: #2d3436;
        margin-top: 5px;
    }

    .btn-respond {
        background: var(--primary-color);
        color: white;
        border-radius: 12px;
        padding: 12px 25px;
        font-weight: 600;
        transition: 0.3s;
        box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
    }

    .btn-respond:hover {
        background: #3a0ca3;
        color: white;
        transform: translateY(-2px);
    }

    .img-evidence {
        max-width: 100%;
        border-radius: 15px;
        margin-top: 20px;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="report-detail-card p-4 p-md-5">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="status-banner">
                        <i class="bi bi-info-circle-fill me-1"></i> Detail Laporan
                    </span>
                    <a href="<?= base_url('pengaduan') ?>" class="btn btn-light btn-sm rounded-pill px-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>

                <h1 class="report-title"><?= $pengaduan['judul'] ?></h1>

                <div class="report-meta">
                    <span><i class="bi bi-person-circle me-1"></i> Pelapor: <b><?= $pengaduan['nama'] ?></b></span>
                    <span><i class="bi bi-geo-alt-fill me-1"></i> Lokasi: <b><?= $pengaduan['lokasi'] ?></b></span>
                    <span><i class="bi bi-calendar3 me-1"></i> Status: <b class="text-primary text-uppercase"><?= $pengaduan['status'] ?></b></span>
                </div>

                <div class="report-description">
                    <?= nl2br($pengaduan['deskripsi']) ?>
                </div>

                <?php if (!empty($pengaduan['foto'])): ?>
                    <div class="mt-4">
                        <p class="fw-bold mb-2">Lampiran Bukti:</p>
                        <img src="<?= base_url('uploads/pengaduan/' . $pengaduan['foto']) ?>" class="img-evidence" alt="Evidence">
                    </div>
                <?php endif; ?>

                <hr class="my-5 opacity-10">

                <div class="timeline-section">
                    <h5 class="timeline-title">
                        <i class="bi bi-chat-left-text-fill me-2 text-primary"></i> 
                        Tanggapan Petugas (<?= count($tanggapan) ?>)
                    </h5>

                    <?php if (!empty($tanggapan)): ?>
                        <?php foreach ($tanggapan as $t): ?>
                            <div class="card comment-card">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="comment-user"><?= $t['nama'] ?></span>
                                        <small class="text-muted" style="font-size: 0.7rem;">Petugas/Admin</small>
                                    </div>
                                    <p class="comment-text mb-0"><?= $t['isi_tanggapan'] ?></p>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="text-center py-4 bg-light rounded-4">
                            <i class="bi bi-chat-dots display-6 text-muted mb-2 d-block"></i>
                            <p class="text-muted mb-0">Belum ada tanggapan untuk laporan ini.</p>
                        </div>
                    <?php endif; ?>

                    <div class="mt-4">
                        <a href="<?= base_url('tanggapan/create/' . $pengaduan['id_pengaduan']) ?>" class="btn btn-respond">
                            <i class="bi bi-plus-lg me-1"></i> Berikan Tanggapan
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 rounded-4 shadow-sm p-4 h-100" style="background: linear-gradient(180deg, #f8fafe 0%, #ffffff 100%);">
                <h5 class="fw-bold mb-3">Informasi Tambahan</h5>
                <p class="small text-muted">Laporan ini bersifat rahasia dan hanya dapat diakses oleh Admin serta petugas yang berwenang.</p>
                
                <div class="alert alert-warning border-0 rounded-3">
                    <small>Pastikan setiap tanggapan menggunakan bahasa yang sopan dan solutif.</small>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>