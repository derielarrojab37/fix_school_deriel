<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login - FIXSCHOOL</title>

    <!-- Bootstrap -->
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <!-- Custom Style -->
    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            border-radius: 15px;
            overflow: hidden;
        }

        .login-header {
            background: transparent;
            text-align: center;
        }

        .login-header h4 {
            font-weight: bold;
            color: #4e73df;
        }

        .login-header p {
            font-size: 14px;
            color: #888;
        }

        .form-control {
            border-radius: 10px;
        }

        .btn-primary {
            border-radius: 10px;
            background-color: #4e73df;
            border: none;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        .logo {
            width: 70px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card shadow-lg login-card" style="width: 400px;">

            <div class="card-body p-4">

                <!-- Header -->
                <div class="login-header mb-4">
                    <img src="<?= base_url('assets/img/logo.png') ?>" class="logo">
                    <h4>FIXSCHOOL</h4>
                    <p>Sistem Pengaduan Sarana Sekolah</p>
                </div>

                <!-- Alert -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('salahpw')): ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('salahpw') ?></div>
                <?php endif; ?>

                <!-- Form -->
                <form action="<?= base_url('/proses-login') ?>" method="post">

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 mt-2">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </button>

                </form>

                <!-- Footer -->
                <div class="text-center mt-4">
                    <small>Belum punya akun?</small><br>
                    <a href="<?= base_url('users/create') ?>" class="btn btn-outline-success btn-sm mt-2">
                        <i class="bi bi-person-plus"></i> Daftar
                    </a>
                </div>

            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>