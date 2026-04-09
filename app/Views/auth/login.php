<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Pengaduan</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        :root {
            /* Warna yang lebih vibrant */
            --glass-bg: rgba(255, 255, 255, 0.08);
            --glass-border: rgba(255, 255, 255, 0.15);
            --primary-accent: #4361ee;
            --input-bg: rgba(255, 255, 255, 0.05);
        }

        body {
            height: 100vh;
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: url("<?= base_url('assets/images/bg-sekolah.jpg') ?>") no-repeat center center/cover;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Overlay lebih halus */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at center, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.8) 100%);
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 20px;
        }

        .login-card {
            backdrop-filter: blur(25px) saturate(200%);
            -webkit-backdrop-filter: blur(25px) saturate(200%);
            background: var(--glass-bg);
            border-radius: 28px;
            border: 1px solid var(--glass-border);
            color: white;
            padding: 45px !important;
            max-width: 440px;
            margin: auto;
            /* Shadow yang lebih dalam dan lembut */
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.4);
            animation: fadeInScale 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes fadeInScale {
            from { opacity: 0; transform: scale(0.95) translateY(20px); }
            to { opacity: 1; transform: scale(1) translateY(0); }
        }

        .school-logo {
            filter: drop-shadow(0 8px 15px rgba(0,0,0,0.2));
            margin-bottom: 20px;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .school-logo:hover {
            transform: rotate(10deg) scale(1.15);
        }

        .school-title {
            font-weight: 800;
            letter-spacing: -1px;
            margin-bottom: 2px;
        }

        .subtitle {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255,255,255,0.6);
            margin-bottom: 35px;
        }

        /* Input Styling yang ditingkatkan */
        .form-label {
            color: rgba(255,255,255,0.8);
            margin-left: 5px;
        }

        .form-control {
            background: var(--input-bg);
            backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 14px 18px;
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: rgba(255,255,255,0.3);
        }

        .form-control:focus {
            background: rgba(255,255,255,0.12);
            border-color: var(--primary-accent);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.15);
            color: white;
            transform: translateY(-1px);
        }

        /* Button Styling */
        .btn-primary {
            background: linear-gradient(135deg, #4361ee, #3a0ca3);
            border: none;
            padding: 14px;
            border-radius: 15px;
            font-weight: 700;
            margin-top: 10px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(67, 97, 238, 0.4);
            filter: brightness(1.1);
        }

        /* Tombol Daftar yang lebih elegan */
        .btn-register {
            display: inline-block;
            margin-top: 10px;
            padding: 8px 20px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid var(--glass-border);
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            background: white;
            color: var(--primary-accent);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255,255,255,0.2);
        }

        .alert {
            background: rgba(255, 75, 75, 0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 75, 75, 0.2);
            color: #ff9b9b;
            border-radius: 15px;
        }
        /* Penyesuaian Input Group untuk Password */
        .input-group-text-eye {
            background: var(--input-bg);
            backdrop-filter: blur(5px);
            border: 1px solid var(--glass-border);
            border-left: none; /* Hilangkan border kiri agar menyatu dengan input */
            color: rgba(255,255,255,0.6);
            border-radius: 0 15px 15px 0;
            cursor: pointer;
            transition: all 0.3s;
        }

        .form-control-password {
            border-right: none; /* Hilangkan border kanan agar menyatu dengan ikon */
            border-radius: 15px 0 0 15px !important;
        }

        .input-group:focus-within .input-group-text-eye {
            border-color: var(--primary-accent);
            color: white;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="card login-card border-0">
        <div class="text-center">
            <img src="<?= base_url('assets/images/fixschool.png') ?>" width="80" class="school-logo">
            <h3 class="school-title">Fix School</h3>
            <p class="subtitle">Digital Reporting System</p>
        </div>

        <?php if (session()->getFlashdata('error') || session()->getFlashdata('salahpw')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-circle-fill me-2"></i>
                <div>
                    <?= session()->getFlashdata('error') ?: session()->getFlashdata('salahpw') ?>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/proses-login') ?>" method="post">
            <div class="mb-3">
                <label class="form-label small fw-semibold">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>

            <div class="mb-4">
    <label class="form-label small fw-semibold">Password</label>
    <div class="input-group">
        <input type="password" name="password" id="password" class="form-control form-control-password" placeholder="••••••••" required>
        <span class="input-group-text input-group-text-eye" id="togglePassword">
            <i class="bi bi-eye-slash" id="eyeIcon"></i>
        </span>
    </div>
</div>

            <button type="submit" class="btn btn-primary w-100 mb-4">
                Masuk ke Dashboard <i class="bi bi-chevron-right ms-1" style="font-size: 0.8rem;"></i>
            </button>
        </form>

        <div class="text-center">
            <p class="small mb-2" style="color: rgba(255,255,255,0.5)">Belum punya akses sistem?</p>
            <a href="<?= base_url('users/create') ?>" class="btn-register">
                Buat Akun Baru
            </a>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function () {
        // Toggle tipe input
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle ikon mata
        eyeIcon.classList.toggle('bi-eye');
        eyeIcon.classList.toggle('bi-eye-slash');
    });
</script>
</body>
</html>