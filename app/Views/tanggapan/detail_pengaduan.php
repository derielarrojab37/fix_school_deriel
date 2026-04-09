<?= $this->extend('layouts/main') ?> 

<?= $this->section('content') ?>

<style>
    /* CSS kamu yang tadi ... */
</style>

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="tanggapan-section">
                ... (kode form chat dan riwayat percakapan) ...
            </div>
        </div>

        <div class="col-lg-4">
             <div class="card border-0 rounded-4 shadow-sm p-4">
                <h5 class="fw-bold mb-3">Tindakan Admin</h5>
                <div class="d-grid gap-2">
                    <button type="button" class="btn btn-danger rounded-3 py-2 fw-bold" data-bs-toggle="modal" data-bs-target="#modalTolak">
                        <i class="bi bi-x-circle me-2"></i> Tolak Laporan
                    </button>
                    </div>
             </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTolak" ...> ... </div>

<?= $this->endSection() ?>
<style>
    .tanggapan-section {
        margin-top: 50px;
        animation: fadeIn 0.8s ease-in-out;
    }

    .tanggapan-container {
        background: #f8fafe;
        border-radius: 20px;
        padding: 30px;
        border: 1px solid #eef2ff;
    }

    /* Form Chat Style */
    .chat-input-box {
        background: #ffffff;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        margin-bottom: 40px;
    }

    .chat-input-box textarea {
        border: 1px solid #e0e5f2;
        border-radius: 12px;
        padding: 15px;
        resize: none;
        background: #fcfdfe;
        transition: 0.3s;
    }

    .chat-input-box textarea:focus {
        border-color: var(--primary-color);
        background: #fff;
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }

    /* Timeline / Bubble Chat Style */
    .chat-thread {
        position: relative;
        padding-left: 20px;
    }

    .chat-bubble {
        border: none;
        border-radius: 18px;
        margin-bottom: 20px;
        position: relative;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0,0,0,0.02);
    }

    .chat-bubble::before {
        content: "";
        position: absolute;
        left: -8px;
        top: 20px;
        width: 15px;
        height: 15px;
        background: white;
        transform: rotate(45deg);
    }

    .bubble-admin {
        border-left: 5px solid #4361ee;
    }

    .bubble-petugas {
        border-left: 5px solid #4cc9f0;
    }

    .user-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .user-name {
        font-weight: 700;
        color: #2b3674;
        font-size: 0.95rem;
    }

    .chat-date {
        font-size: 0.75rem;
        color: #a3aed0;
    }

    .chat-text {
        color: #4a5568;
        line-height: 1.6;
        font-size: 0.95rem;
        margin-bottom: 0;
    }

    .btn-send-chat {
        background: linear-gradient(135deg, #4361ee, #3a0ca3);
        border: none;
        color: white;
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 600;
        float: right;
    }
</style>

<div class="tanggapan-section">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-primary-subtle p-2 rounded-3 me-3">
            <i class="bi bi-chat-left-dots-fill text-primary fs-4"></i>
        </div>
        <h4 class="fw-bold mb-0" style="color: #2b3674;">Diskusi & Tanggapan</h4>
    </div>

    <div class="chat-input-box">
        <form action="<?= base_url('tanggapan/store') ?>" method="post">
            <input type="hidden" name="id_pengaduan" value="<?= $pengaduan['id_pengaduan'] ?>">
            
            <div class="mb-3">
                <label class="form-label small fw-bold text-muted">Berikan Tanggapan Baru</label>
                <textarea name="isi_tanggapan" class="form-control" rows="3" placeholder="Tulis instruksi atau informasi tambahan di sini..." required></textarea>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-send-chat shadow-sm">
                    Kirim Pesan <i class="bi bi-send-fill ms-2 small"></i>
                </button>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>

    <h6 class="fw-bold text-muted mb-4 text-uppercase" style="font-size: 0.75rem; letter-spacing: 1px;">
        Riwayat Percakapan (<?= count($tanggapan) ?>)
    </h6>

    <div class="chat-thread">
        <?php if (!empty($tanggapan)) : ?>
            <?php foreach ($tanggapan as $t) : ?>
                <div class="card chat-bubble bubble-admin">
                    <div class="card-body p-4">
                        <div class="user-info">
                            <div class="d-flex align-items-center">
                                <div class="bg-light rounded-circle p-1 me-2" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-person-fill text-primary"></i>
                                </div>
                                <span class="user-name"><?= $t['nama'] ?></span>
                                <span class="badge bg-primary-subtle text-primary ms-2" style="font-size: 0.65rem;">PETUGAS</span>
                            </div>
                            <span class="chat-date">
                                <i class="bi bi-calendar3 me-1"></i> 
                                <?= date('d M Y, H:i', strtotime($t['tanggal'])) ?>
                            </span>
                        </div>
                        <p class="chat-text">
                            <?= nl2br(htmlspecialchars($t['isi_tanggapan'])) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <div class="text-center py-5 bg-white rounded-4 border">
                <i class="bi bi-chat-dots display-4 text-muted opacity-25 d-block mb-3"></i>
                <p class="text-muted">Belum ada diskusi lebih lanjut untuk laporan ini.</p>
            </div>
        <?php endif; ?>

<button type="button" class="btn btn-danger rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#modalTolak">
    <i class="bi bi-x-circle me-1"></i> Tolak Laporan
</button>

<div class="modal fade" id="modalTolak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow" style="border-radius: 20px;">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="fw-bold text-danger">Konfirmasi Penolakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('tanggapan/store') ?>" method="post">
                <div class="modal-body px-4">
                    <p class="text-muted small">Berikan alasan yang jelas mengapa laporan ini ditolak agar pelapor dapat memahaminya.</p>
                    
                    <input type="hidden" name="id_pengaduan" value="<?= $pengaduan['id_pengaduan'] ?>">
                    <input type="hidden" name="aksi" value="tolak">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold small">Alasan Penolakan</label>
                        <textarea name="isi_tanggapan" class="form-control" rows="4" placeholder="Contoh: Laporan tidak disertai bukti yang cukup atau lokasi diluar jangkauan." required></textarea>
                    </div>
                </div>
                <div class="modal-footer border-0 pb-4 px-4">
                    <button type="button" class="btn btn-light rounded-3 px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger rounded-3 px-4">Kirim & Tolak Laporan</button>
                </div>
            </form>
        </div>
    </div>
</div>

    </div>
</div>