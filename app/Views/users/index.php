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

    /* Styling Table */
    .table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

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
        background: #ffffff;
        transition: all 0.2s;
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }

    .table tbody tr:hover {
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        background: #fcfdfe;
    }

    .table td {
        padding: 15px;
        vertical-align: middle;
        border-top: 1px solid #f1f4f9;
        border-bottom: 1px solid #f1f4f9;
        color: #2b3674;
        font-weight: 500;
    }

    /* Avatar & Badge */
    .user-avatar {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 12px;
        border: 2px solid #fff;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .role-badge {
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .badge-admin { background: rgba(67, 97, 238, 0.1); color: #4361ee; }
    .badge-teknisi { background: rgba(246, 173, 85, 0.1); color: #dd6b20; }
    .badge-user { background: rgba(163, 174, 208, 0.1); color: #707eae; }

    /* Action Buttons */
    .btn-action {
        width: 35px;
        height: 35px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        transition: 0.3s;
        border: none;
        margin: 0 2px;
    }

    .btn-edit { background: #fff1cc; color: #f6ad55; }
    .btn-edit:hover { background: #f6ad55; color: white; }
    
    .btn-delete { background: #ffe5e5; color: #ff5b5b; }
    .btn-delete:hover { background: #ff5b5b; color: white; }

    .alert {
        border: none;
        border-radius: 15px;
        font-weight: 600;
    }
</style>

<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #2b3674;">Manajemen User</h3>
            <p class="text-muted small mb-0">Total <?= count($users) ?> pengguna terdaftar di sistem.</p>
        </div>
        <?php if (session()->get('role') == 'admin') : ?>
            <a href="<?= base_url('users/create') ?>" class="btn btn-primary rounded-pill px-4">
                <i class="bi bi-person-plus-fill me-2"></i> Tambah User Baru
            </a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success d-flex align-items-center mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <div><?= session()->getFlashdata('success') ?></div>
        </div>
    <?php endif; ?>

    <div class="content-card">
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th width="70" class="text-center">No</th>
                        <th>User</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th class="text-center">Status</th>
                        <?php if (session()->get('role') == 'admin') : ?>
                            <th width="120" class="text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($users)): ?>
                        <?php $no = 1; foreach ($users as $u): ?>
                            <tr>
                                <td class="text-center text-muted"><?= $no++ ?></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <?php if ($u['foto']): ?>
                                            <img src="<?= base_url('uploads/users/' . $u['foto']) ?>" class="user-avatar me-3">
                                        <?php else: ?>
                                            <div class="user-avatar me-3 bg-light d-flex align-items-center justify-content-center text-muted">
                                                <i class="bi bi-person-fill"></i>
                                            </div>
                                        <?php endif; ?>
                                        <div class="fw-bold"><?= $u['nama'] ?></div>
                                    </div>
                                </td>
                                <td class="text-muted">@<?= $u['username'] ?></td>
                                <td>
                                    <?php 
                                        $roleClass = 'badge-user';
                                        if($u['role'] == 'user') $roleClass = 'badge-user';
                                        if($u['role'] == 'admin') $roleClass = 'badge-admin';
                                        if($u['role'] == 'teknisi') $roleClass = 'badge-teknisi';
                                    ?>
                                    <span class="role-badge <?= $roleClass ?>">
                                        <?= ucfirst($u['role']) ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-success-subtle text-success small px-2">Aktif</span>
                                </td>
                                <?php if (session()->get('role') == 'admin') : ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('users/edit/' . $u['id_user']) ?>" class="btn-action btn-edit" title="Edit User">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <a href="<?= base_url('users/delete/' . $u['id_user']) ?>" 
                                           onclick="return confirm('Hapus user ini?')" 
                                           class="btn-action btn-delete" title="Hapus User">
                                            <i class="bi bi-trash-fill"></i>
                                        </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <img src="https://illustrations.popsy.co/white/abstract-art-4.svg" style="width: 150px;" class="mb-3">
                                <p class="text-muted">Belum ada data user yang tersedia.</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>