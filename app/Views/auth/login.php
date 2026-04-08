<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Sistem Pengaduan</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        body {
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: url("<?= base_url('assets/images/bg-sekolah.jpg') ?>") no-repeat center center/cover;
            position: relative;
        }

        /* Overlay gelap biar teks jelas */
        body::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            top: 0;
            left: 0;
        }

        .login-container {
            position: relative;
            z-index: 2;
        }

        .login-card {
            backdrop-filter: blur(12px);
            background: rgba(255,255,255,0.1);
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.2);
            color: white;
        }

        .login-card .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .form-control {
            background: rgba(255,255,255,0.2);
            border: none;
            color: white;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.3);
            box-shadow: none;
            color: white;
        }

        .btn-primary {
            background: #0d6efd;
            border: none;
            transition: 0.3s;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        .btn-outline-light {
            border-color: #fff;
            color: #fff;
        }

        .btn-outline-light:hover {
            background: #fff;
            color: #000;
        }

        .school-title {
            font-weight: 600;
            letter-spacing: 1px;
        }

        .subtitle {
            font-size: 14px;
            opacity: 0.8;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100 login-container">

    <div class="card login-card shadow p-3" style="width: 400px;">

        <div class="text-center mb-3">
            <img src="<?= base_url('assets/images/fixschool.png') ?>" width="60">
            <h4 class="school-title">Fix School</h4>
            <div class="subtitle">Sistem PengaduanSchool</div>
        </div>

        <!-- ERROR -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('salahpw')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('salahpw') ?></div>
        <?php endif; ?>

        <!-- FORM -->
        <form action="<?= base_url('/proses-login') ?>" method="post">

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <button class="btn btn-primary w-100 mb-2">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>

        </form>

        <!-- REGISTER -->
        <div class="text-center">
            <a href="<?= base_url('users/create') ?>" class="btn btn-outline-light btn-sm">
                <i class="bi bi-person-plus"></i> Daftar Baru
            </a>
        </div>

    </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

</body>
</html>