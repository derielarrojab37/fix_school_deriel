<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - Fix School</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        :root {
            --glass-bg: rgba(255, 255, 255, 0.07);
            --glass-border: rgba(255, 255, 255, 0.12);
            --primary-accent: #4361ee;
            --secondary-accent: #4cc9f0;
        }

        body {
            min-height: 100vh;
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: url("<?= base_url('assets/images/bg-sekolah.jpg') ?>") no-repeat center center/cover fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 0;
        }

        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at top right, rgba(67, 97, 238, 0.15), transparent),
                        linear-gradient(135deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.6) 100%);
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .register-card {
            backdrop-filter: blur(25px) saturate(180%);
            -webkit-backdrop-filter: blur(25px) saturate(180%);
            background: var(--glass-bg);
            border-radius: 30px;
            border: 1px solid var(--glass-border);
            color: white;
            padding: 40px !important;
            max-width: 550px;
            margin: auto;
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header-section {
            margin-bottom: 30px;
            text-align: center;
        }

        .header-section i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary-accent), var(--secondary-accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 600;
            color: rgba(255,255,255,0.7);
            margin-left: 5px;
        }

        /* Input Styling */
        .form-control, .form-select {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            color: white !important;
            padding: 12px 18px;
            border-radius: 14px;
            transition: all 0.3s;
        }

        .form-select option {
            background: #1a1a1a;
            color: white;
        }

        .form-control:focus, .form-select:focus {
            background: rgba(255,255,255,0.1);
            border-color: var(--primary-accent);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.2);
            outline: none;
        }

        /* Custom File Upload */
        .form-control[type="file"] {
            padding: 10px;
        }
        .form-control[type="file"]::file-selector-button {
            background: rgba(255,255,255,0.1);
            border: none;
            color: white;
            padding: 5px 15px;
            border-radius: 8px;
            margin-right: 15px;
            cursor: pointer;
            transition: 0.3s;
        }
        .form-control[type="file"]::file-selector-button:hover {
            background: var(--primary-accent);
        }

        /* Buttons */
        .btn-save {
            background: linear-gradient(135deg, var(--primary-accent), #3a0ca3);
            border: none;
            padding: 14px;
            border-radius: 14px;
            font-weight: 700;
            color: white;
            width: 100%;
            margin-top: 15px;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(67, 97, 238, 0.3);
        }

        .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(67, 97, 238, 0.5);
            filter: brightness(1.1);
        }

        .btn-back {
            display: block;
            text-align: center;
            text-decoration: none;
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            margin-top: 20px;
            transition: 0.3s;
        }

        .btn-back:hover {
            color: white;
        }

        .alert {
            background: rgba(255, 75, 75, 0.1);
            border: 1px solid rgba(255, 75, 75, 0.2);
            color: #ff8686;
            border-radius: 14px;
            font-size: 0.9rem;
        }

        /* Input Group Password (Hide/Show) */
        .password-toggle {
            cursor: pointer;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            border-left: none;
            color: rgba(255,255,255,0.5);
            border-radius: 0 14px 14px 0;
            display: flex;
            align-items: center;
            padding: 0 15px;
        }

        .pass-input {
            border-right: none;
            border-radius: 14px 0 0 14px !important;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="register-card">
        <div class="header-section">
            <i class="bi bi-person-plus-fill"></i>
            <h3 class="fw-bold mt-2">Daftar Akun</h3>
            <p class="text-white-50 small">Lengkapi data untuk bergabung ke Fix School</p>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger d-flex align-items-center">
                <i class="bi bi-exclamation-circle me-2"></i>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('users/store') ?>" method="post" enctype="multipart/form-data">
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama sesuai identitas" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Contoh: user123" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" id="password" class="form-control pass-input" placeholder="••••••••" required>
                        <span class="password-toggle" id="togglePassword">
                            <i class="bi bi-eye-slash" id="eyeIcon"></i>
                        </span>
                    </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label class="form-label">Role Akses</label>
                    <select name="role" class="form-select" required>
                        <option value="" hidden>Pilih hak akses...</option>
                        <option value="user">User / Pelapor</option>
                        <option value="admin">Administrator</option>
                        <option value="teknisi">Tim Teknisi</option>
                    </select>
                </div>

                <div class="col-md-12 mb-4">
                    <label class="form-label">Foto Profil <span class="text-white-50">(Opsional)</span></label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                </div>
            </div>

            <button type="submit" class="btn btn-save">
                Buat Akun Sekarang <i class="bi bi-arrow-right ms-2"></i>
            </button>

            <a href="<?= base_url('login') ?>" class="btn-back">
                Sudah punya akun? <strong>Login di sini</strong>
            </a>
        </form>
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

</body>
</html>