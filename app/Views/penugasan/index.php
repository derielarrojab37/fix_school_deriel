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
        padding: 18px 15px;
        vertical-align: middle;
        border-bottom: 1px solid #f1f4f9;
        color: #2b3674;
    }

    /* Assignment Badge */
    .tech-badge {
        display: flex;
        align-items: center;
        background: #f4f7fe;
        padding: 5px 12px;
        border-radius: 10px;
        font-weight: 600;
        color: var(--primary-color);
        width: fit-content;
    }

    .date-badge {
        font-size: 0.8rem;
        color: var(--text-muted);
        display: flex;
        align-items: center;
    }

    /* Status Dot */
    .status-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 8px;
    }

    .btn-action {
        border-radius: 10px;
        font-weight: 600;
        padding: 6px 15px;
        transition: 0.3s;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #2b3674;">Monitoring Penugasan</h3>
            <p class="text-muted small mb-0">Pantau distribusi tugas teknisi untuk setiap pengaduan.</p>
        </div>
        <?php if (session()->get('role') == 'admin') : ?>
            <a href="<?= base_url('penugasan/create') ?>" class="btn btn-primary rounded-pill px-4 shadow-sm">
                <i class="bi bi-briefcase-fill me-2"></i> Delegasikan Tugas
            </a>
        <?php endif; ?>
    </div>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="50" class="text-center">No</th>
                        <th>Laporan Pengaduan</th>
                        <th>Teknisi Terpilih</th>
                        <th>Waktu Penugasan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($penugasan)): ?>
                        <?php $no=1; foreach ($penugasan as $pn): ?>
                        <tr>
                            <td class="text-center text-muted fw-bold"><?= $no++ ?></td>
                            <td>
                                <div class="fw-bold" style="font-size: 1rem;"><?= $pn['judul'] ?></div>
                                <div class="text-muted small"><i class="bi bi-geo-alt me-1"></i> <?= $pn['lokasi'] ?></div>
                            </td>
                            <td>
                                <div class="tech-badge">
                                    <i class="bi bi-person-badge-fill me-2"></i>
                                    <?= $pn['nama'] ?> </div>
                            </td>
                            <td>
                                <div class="date-badge">
                                    <i class="bi bi-calendar-event me-2"></i>
                                    <?= date('d M Y', strtotime($pn['tgl_penugasan'])) ?>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-light btn-sm rounded-pill px-3 shadow-sm border" type="button" data-bs-toggle="dropdown">
                                        Opsi <i class="bi bi-chevron-down ms-1 small"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow border-0 p-2" style="border-radius: 12px;">
                                        <li><a class="dropdown-item rounded-2" href="<?= base_url('pengaduan/detail/' . $pn['id_pengaduan']) ?>"><i class="bi bi-eye me-2 text-primary"></i> Lihat Progress</a></li>
                                        <?php if (session()->get('role') == 'admin') : ?>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item rounded-2 text-danger" href="<?= base_url('penugasan/delete/' . $pn['id_penugasan']) ?>" onclick="return confirm('Batalkan penugasan ini?')"><i class="bi bi-x-circle me-2"></i> Batalkan Tugas</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox display-4 d-block mb-3 opacity-25"></i>
                                    Belum ada penugasan yang dibuat.
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>