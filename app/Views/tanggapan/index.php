<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .content-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(112, 144, 176, 0.08);
        padding: 30px;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Table Styling */
    .table thead th {
        background: #f8fafe;
        border: none;
        color: #a3aed0;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 15px;
    }

    .table td {
        padding: 20px 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f4f9;
        color: #2b3674;
    }

    /* Avatar Initial */
    .avatar-sm {
        width: 35px;
        height: 35px;
        background: var(--primary-color);
        color: white;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 0.8rem;
    }

    /* Text Truncate */
    .text-truncate-custom {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        color: #4a5568;
    }

    .report-link {
        color: var(--primary-color);
        font-weight: 700;
        text-decoration: none;
        transition: 0.2s;
    }

    .report-link:hover {
        color: #3a0ca3;
        text-decoration: underline;
    }

    .date-text {
        font-size: 0.85rem;
        color: #a3aed0;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #2b3674;">Riwayat Tanggapan</h3>
            <p class="text-muted small mb-0">Daftar seluruh umpan balik yang diberikan oleh petugas.</p>
        </div>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Laporan Pengaduan</th>
                        <th>Oleh Petugas</th>
                        <th>Isi Tanggapan</th>
                        <th>Waktu</th>
                        <th width="100" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($tanggapan)): ?>
                        <?php $no=1; foreach ($tanggapan as $t): ?>
                        <tr>
                            <td class="text-center fw-bold text-muted"><?= $no++ ?></td>
                            <td>
                                <a href="<?= base_url('pengaduan/detail/' . $t['id_pengaduan']) ?>" class="report-link">
                                    <?= $t['judul'] ?>
                                </a>
                                <div class="text-muted small" style="font-size: 0.7rem;">ID: #PGN-<?= $t['id_pengaduan'] ?></div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-2">
                                        <?= strtoupper(substr($t['nama'], 0, 1)) ?>
                                    </div>
                                    <span class="fw-semibold"><?= $t['nama'] ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="text-truncate-custom">
                                    <?= $t['isi_tanggapan'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="date-text">
                                    <i class="bi bi-clock-history me-1"></i>
                                    <?= date('d/m/Y H:i', strtotime($t['tanggal'])) ?>
                                </div>
                            </td>
                            <td class="text-center">
    <div class="d-flex justify-content-center gap-2">
        <a href="<?= base_url('tanggapan/detail_pengaduan/' . $t['id_pengaduan']) ?>" class="btn ...">
    <i class="bi bi-eye"></i>
</a>

        <a href="<?= base_url('tanggapan/edit/' . $t['id_tanggapan']) ?>" class="btn btn-primary btn-sm rounded-pill shadow-sm" style="background-color: #4361ee; border: none;">
            <i class="bi bi-pencil-square"></i>
        </a>

        <a href="<?= base_url('tanggapan/delete/' . $t['id_tanggapan']) ?>" class="btn btn-danger btn-sm rounded-pill shadow-sm" onclick="return confirm('Hapus tanggapan ini?')">
            <i class="bi bi-trash"></i>
        </a>
    </div>
</td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted italic">
                                <i class="bi bi-chat-dots-fill display-4 d-block mb-3 opacity-25"></i>
                                Belum ada riwayat tanggapan yang tercatat.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>