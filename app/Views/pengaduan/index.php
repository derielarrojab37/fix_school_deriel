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

    .table tbody tr {
        transition: all 0.2s;
    }

    .table tbody tr:hover {
        background: #fcfdfe;
    }

    .table td {
        padding: 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f4f9;
        color: #2b3674;
        font-weight: 500;
    }

    /* Badge Status Custom */
    .badge-status {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
        display: inline-block;
    }

    .status-pending { background: #fff5f5; color: #ff5b5b; }
    .status-proses { background: #fffaf0; color: #f6ad55; }
    .status-selesai { background: #f0fff4; color: #48bb78; }

    /* Detail Button */
    .btn-detail {
        background: #eef2ff;
        color: #4361ee;
        border: none;
        padding: 6px 15px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s;
        text-decoration: none;
        font-size: 0.85rem;
    }

    .btn-detail:hover {
        background: #4361ee;
        color: white;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #2b3674;">Data Pengaduan</h3>
            <p class="text-muted small mb-0">Kelola laporan kerusakan dari warga sekolah.</p>
        </div>
        <a href="<?= base_url('pengaduan/create') ?>" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i> Tambah Laporan
        </a>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="60" class="text-center">No</th>
                        <th>Laporan / Judul</th>
                        <th>Pelapor</th>
                        <th>Lokasi</th>
                        <th class="text-center">Status</th>
                        <th width="100" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($pengaduan)): ?>
                        <?php $no=1; foreach ($pengaduan as $p): ?>
                        <tr>
                            <td class="text-center text-muted"><?= $no++ ?></td>
                            <td>
                                <div class="fw-bold"><?= $p['judul'] ?></div>
                                <small class="text-muted">ID: #PGN-0<?= $p['id_pengaduan'] ?></small>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-circle me-2 text-primary"></i>
                                    <?= $p['nama'] ?>
                                </div>
                            </td>
                            <td>
                                <span class="text-muted"><i class="bi bi-geo-alt me-1"></i> <?= $p['lokasi'] ?></span>
                            </td>
                            <td class="text-center">
                                <?php 
                                    $status = strtolower($p['status']);
                                    $class = 'status-pending';
                                    if ($status == 'proses') $class = 'status-proses';
                                    if ($status == 'selesai') $class = 'status-selesai';
                                ?>
                                <span class="badge-status <?= $class ?>">
                                    <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>
                                    <?= ucfirst($p['status']) ?>
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="<?= base_url('pengaduan/detail/' . $p['id_pengaduan']) ?>" class="btn-detail">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">Belum ada data pengaduan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>