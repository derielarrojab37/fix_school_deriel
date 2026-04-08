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
            --glass-bg: rgba(255, 255, 255, 0.12);
            --glass-border: rgba(255, 255, 255, 0.25);
            --primary-accent: #4361ee;
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

        /* Overlay dengan Gradient agar lebih dramatis */
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
            z-index: 1;
        }

        .login-container {
            position: relative;
            z-index: 2;
            width: 100%;
            padding: 20px;
        }

        .login-card {
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            background: var(--glass-bg);
            border-radius: 24px;
            border: 1px solid var(--glass-border);
            color: white;
            padding: 40px !important;
            max-width: 420px;
            margin: auto;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .school-logo {
            filter: drop-shadow(0 0 10px rgba(255,255,255,0.2));
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .school-logo:hover {
            transform: scale(1.1);
        }

        .school-title {
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 0.9rem;
            color: rgba(255,255,255,0.7);
            margin-bottom: 30px;
        }

        /* Input Styling */
        .input-group-text {
            background: rgba(255,255,255,0.1);
            border: 1px solid var(--glass-border);
            color: white;
            border-radius: 12px 0 0 12px;
        }

        .form-control {
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 12px 15px;
            border-radius: 12px;
            transition: all 0.3s;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.15);
            border-color: var(--primary-accent);
            box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.25);
            color: white;
        }

        /* Button Styling */
        .btn-primary {
            background: var(--primary-accent);
            border: none;
            padding: 12px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.4);
        }

        .btn-primary:hover {
            background: #3651d1;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(67, 97, 238, 0.6);
        }

        .btn-register-accent {
    display: inline-block;
    width: 100%;
    padding: 10px;
    background: rgba(255, 255, 255, 1); /* Putih solid */
    color: #4361ee; /* Warna teks biru primary */
    border-radius: 12px;
    text-decoration: none;
    font-weight: 700;
    font-size: 0.9rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.btn-register-accent:hover {
    background: #f0f0f0;
    transform: scale(1.02);
}

        .alert {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #ff8686;
            border-radius: 12px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="card login-card shadow border-0">
        
        <div class="text-center">
            <img src="<?= base_url('assets/images/fixschool.png') ?>" width="75" class="school-logo">
            <h3 class="school-title">Fix School</h3>
            <p class="subtitle">Sistem Pengaduan Digital</p>
        </div>

        <?php if (session()->getFlashdata('error') || session()->getFlashdata('salahpw')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <div>
                    <?= session()->getFlashdata('error') ?: session()->getFlashdata('salahpw') ?>
                </div>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/proses-login') ?>" method="post">
            <div class="mb-3">
                <label class="form-label small fw-bold">Username</label>
                <div class="input-group">
                    <input type="text" name="username" class="form-control" placeholder="admin123" required>
                </div>
            </div>

            <div class="mb-4">
                <label class="form-label small fw-bold">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 mb-4">
                Login ke Panel <i class="bi bi-arrow-right-short ms-1"></i>
            </button>
        </form>

        <div class="text-center">
            <span class="small opacity-50">Belum punya akun?</span><br>
            <a href="<?= base_url('users/create') ?>" class="btn-register fw-bold">
                Mulai Daftar Sekarang
            </a>
        </div>

    </div>
</div>

<script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>