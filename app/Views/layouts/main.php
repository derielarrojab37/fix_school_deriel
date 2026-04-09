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
        --sidebar-width: 270px;
        --primary-color: #4361ee;
        --secondary-color: #4cc9f0;
        --bg-light: #f4f7fe;
        --sidebar-bg: #ffffff;
        --text-dark: #2b3674;
        --text-muted: #a3aed0;
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: var(--bg-light);
        display: flex;
        min-height: 100vh;
        margin: 0;
        color: var(--text-dark);
    }

    /* --- Sidebar Modern --- */
    .sidebar {
        width: var(--sidebar-width);
        background-color: var(--sidebar-bg);
        border-right: 1px solid rgba(0,0,0,0.02);
        display: flex;
        flex-direction: column;
        transition: var(--transition);
        position: fixed; /* Biar sidebar tetap di tempat saat scroll */
        height: 100vh;
        z-index: 1000;
    }

    .sidebar-header {
        padding: 2.5rem 2rem;
        font-weight: 800;
        font-size: 1.5rem;
        color: var(--text-dark);
        display: flex;
        align-items: center;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .sidebar-header i {
        color: var(--primary-color);
        margin-right: 12px;
    }

    /* --- Konten Utama --- */
    .content {
        flex-grow: 1;
        padding: 2rem 2.5rem;
        margin-left: var(--sidebar-width); /* Memberi ruang untuk fixed sidebar */
        width: calc(100% - var(--sidebar-width));
        transition: var(--transition);
    }

    /* --- Widget Dashboard --- */
    .stat-card {
        background: white;
        border-radius: 20px;
        padding: 20px;
        border: none;
        display: flex;
        align-items: center;
        box-shadow: 0px 18px 40px rgba(112, 144, 176, 0.12);
        transition: transform 0.3s;
    }

    .stat-card:hover {
        transform: translateY(-5px);
    }

    .icon-box {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        background: var(--bg-light);
        color: var(--primary-color);
        margin-right: 15px;
    }

    .stat-title {
        color: var(--text-muted);
        font-size: 0.85rem;
        font-weight: 500;
        margin-bottom: 2px;
    }

    .stat-value {
        color: var(--text-dark);
        font-size: 1.4rem;
        font-weight: 700;
    }

    /* --- Main Content Card --- */
    .main-card {
        background: #ffffff;
        border-radius: 24px;
        padding: 30px;
        border: none;
        box-shadow: 0px 18px 40px rgba(112, 144, 176, 0.1);
        min-height: 400px;
    }

    /* Tombol Notification yang lebih bergaya */
    .btn-notif {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: var(--primary-color);
        border: none;
        box-shadow: 0px 10px 20px rgba(112, 144, 176, 0.1);
        position: relative;
    }

    .btn-notif::after {
        content: '';
        position: absolute;
        top: 12px;
        right: 12px;
        width: 8px;
        height: 8px;
        background: #ff5b5b;
        border-radius: 50%;
        border: 2px solid white;
    }

    /* User Profile Box di Sidebar */
    .user-sidebar-info {
        background: var(--bg-light);
        margin: 20px;
        padding: 15px;
        border-radius: 16px;
        display: flex;
        align-items: center;
    }

    .user-avatar-sm {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: var(--primary-color);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 10px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .sidebar { transform: translateX(-100%); }
        .content { margin-left: 0; width: 100%; }
    }
    /* State Sidebar Tertutup */
    .sidebar.collapsed {
        margin-left: calc(var(--sidebar-width) * -1);
    }

    /* Penyesuaian Konten saat Sidebar Tertutup */
    .content.expanded {
        margin-left: 0;
        width: 100%;
    }

    /* Tombol Toggle Styling */
    .toggle-sidebar-btn {
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 10px;
        color: var(--primary-color);
        box-shadow: 0px 10px 20px rgba(112, 144, 176, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: var(--transition);
        margin-right: 15px;
    }

    .toggle-sidebar-btn:hover {
        background: var(--primary-color);
        color: white;
    }

    /* Overlay untuk Mobile (Opsional) */
    @media (max-width: 768px) {
        .sidebar { margin-left: calc(var(--sidebar-width) * -1); }
        .sidebar.mobile-show { margin-left: 0; }
        .content { margin-left: 0; width: 100%; }
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

    <main id="main-content" class="content">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="d-flex align-items-center">
                    <button class="toggle-sidebar-btn" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <h4 class="fw-bold mb-0">Dashboard Overview</h4>
                </div>
                
                <button class="btn btn-notif">
                    <i class="bi bi-bell"></i>
                </button>
            </div>

            <div class="main-card">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </main>

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        sidebarToggle.addEventListener('click', () => {
            // Untuk Desktop
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');

            // Untuk Mobile
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('mobile-show');
            }
        });

        // Menutup sidebar otomatis jika layar di-resize ke ukuran mobile
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('mobile-show');
            }
        });
    </script>
</body>
</html>