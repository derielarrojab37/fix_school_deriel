<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<style>
    .edit-card {
        background: #ffffff;
        border-radius: 20px;
        border: none;
        box-shadow: 0 10px 30px rgba(112, 144, 176, 0.1);
        overflow: hidden;
        animation: slideIn 0.5s ease-out;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .edit-header {
        background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);
        padding: 25px;
        border: none;
        color: white;
    }

    .form-label {
        font-weight: 600;
        color: #2b3674;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .form-control, .form-select {
        border-radius: 12px;
        padding: 12px 15px;
        border: 1px solid #e0e5f2;
        color: #2b3674;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #fda085;
        box-shadow: 0 0 0 4px rgba(253, 160, 133, 0.1);
    }

    .preview-img-container {
        padding: 10px;
        background: #f8fafe;
        border-radius: 15px;
        display: inline-block;
        border: 2px dashed #e0e5f2;
    }

    .btn-update {
        background: linear-gradient(135deg, #48bb78, #38a169);
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        color: white;
        transition: all 0.3s;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(72, 187, 120, 0.3);
        filter: brightness(1.1);
    }

    .btn-cancel {
        background: #f4f7fe;
        color: #a3aed0;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 600;
        transition: 0.3s;
    }

    .btn-cancel:hover {
        background: #e0e5f2;
        color: #2b3674;
    }

    .input-group-text-custom {
        background: #f8fafe;
        border: 1px solid #e0e5f2;
        border-radius: 0 12px 12px 0;
        color: #a3aed0;
    }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="edit-card shadow-sm">
                <div class="edit-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-white rounded-circle p-2 me-3 shadow-sm">
                            <i class="bi bi-pencil-square text-warning fs-4"></i>
                        </div>
                        <h4 class="mb-0 fw-bold">Edit Informasi Pengguna</h4>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <form action="<?= base_url('users/update/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama" value="<?= $user['nama'] ?>" class="form-control" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Isi hanya jika ingin ganti">
                                    <span class="input-group-text input-group-text-custom" id="togglePassword" style="cursor: pointer;">
                                        <i class="bi bi-eye-slash" id="eyeIcon"></i>
                                    </span>
                                </div>
                                <small class="text-muted mt-1 d-block"><i class="bi bi-info-circle me-1"></i>Biarkan kosong jika tetap.</small>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Role Akses</label>
                                <select name="role" class="form-select">
                                    <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User / Pelapor</option>
                                    <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
                                    <option value="teknisi" <?= $user['role'] == 'teknisi' ? 'selected' : '' ?>>Tim Teknisi</option>
                                </select>
                            </div>

                            <div class="col-md-12 mb-4">
                                <label class="form-label d-block">Foto Profil</label>
                                <div class="d-flex align-items-start gap-4 flex-wrap">
                                    <div class="preview-img-container">
                                        <?php if ($user['foto']): ?>
                                            <img src="<?= base_url('uploads/users/' . $user['foto']) ?>" width="100" height="100" class="rounded object-fit-cover shadow-sm">
                                        <?php else: ?>
                                            <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                                <i class="bi bi-person text-muted fs-1"></i>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-grow-1">
                                        <input type="file" name="foto" class="form-control">
                                        <p class="small text-muted mt-2 mb-0">Disarankan format persegi (JPG, PNG). Maks 2MB.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4 border-top pt-4">
                            <a href="<?= base_url('users') ?>" class="btn btn-cancel">Batal</a>
                            <button type="submit" class="btn btn-update">
                                <i class="bi bi-check-lg me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fitur Hide/Show Password
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        eyeIcon.classList.toggle('bi-eye');
        eyeIcon.classList.toggle('bi-eye-slash');
    });
</script>

<?= $this->endSection() ?>