<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fix School | Modern Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/bootstrap-icons-1.13.1/bootstrap-icons.css') ?>" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary-color: #4361ee;
            --bg-light: #f8fafe;
            --sidebar-bg: #ffffff;
            --text-muted: #6c757d;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            display: flex;
            min-height: 100vh;
            margin: 0;
            color: #2d3436;
        }

        /* --- Sidebar Modern --- */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--sidebar-bg);
            border-right: 1px solid rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            z-index: 1000;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.02);
        }

        /* Styling untuk menu di dalam Sidebar (mengasumsikan menu.php berisi list) */
        .sidebar-header {
            padding: 2rem 1.5rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: var(--primary-color);
            letter-spacing: -0.5px;
        }

        /* --- Konten Utama --- */
        .content {
            flex-grow: 1;
            padding: 2rem;
            max-width: calc(100% - var(--sidebar-width));
            transition: var(--transition);
        }

        /* Efek Hover & Active pada Menu (Update di menu.php kamu juga nanti) */
        .nav-link {
            border-radius: 12px;
            margin: 4px 15px;
            padding: 10px 15px;
            color: var(--text-muted);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-link:hover {
            background-color: rgba(67, 97, 238, 0.08);
            color: var(--primary-color);
        }

        .nav-link.active {
            background-color: var(--primary-color);
            color: white !important;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.3);
        }

        /* Card Container untuk Konten */
        .main-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 25px;
            border: none;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        /* Responsive Mobile */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
            }
            .sidebar span { display: none; } /* Sembunyikan teks menu */
            .content { max-width: calc(100% - 70px); }
        }
    </style>
</head>

<body>
    <aside id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <i class="bi bi-mortarboard-fill me-2"></i><span>FixSchool</span>
        </div>
        <div class="flex-grow-1">
            <?php include(APPPATH . 'Views/layouts/menu.php'); ?>
        </div>
        <div class="p-3 mt-auto">
            <div class="p-3 rounded-4 bg-light text-center" style="font-size: 0.8rem;">
                <p class="mb-0 text-muted">Logged as <b>Admin</b></p>
            </div>
        </div>
    </aside>

    <main class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold mb-0">Dashboard Overview</h4>
                <button class="btn btn-outline-primary btn-sm rounded-pill">
                    <i class="bi bi-bell"></i>
                </button>
            </div>

            <div class="main-card">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </main>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
</body>
</html>