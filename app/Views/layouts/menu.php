<style>
    /* Reset & Container */
    .nav-pills-custom {
        padding: 0 12px;
    }

    /* Menu Styling */
    .nav-link {
        color: #8b95b7 !important; /* Warna teks pasif */
        font-weight: 500;
        padding: 12px 20px;
        border-radius: 14px;
        transition: all 0.3s ease;
        margin-bottom: 4px;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
    }

    .nav-link i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    /* Hover State */
    .nav-link:hover {
        background-color: #f4f7fe;
        color: #4361ee !important;
        transform: translateX(5px);
    }

    .nav-link:hover i {
        transform: scale(1.1);
    }

    /* Active State */
    .nav-link.active {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%) !important;
        color: white !important;
        box-shadow: 0 10px 20px rgba(67, 97, 238, 0.25);
    }

    .nav-link.active i {
        color: white !important;
    }

    /* User Profile Box */
    .user-sidebar-info {
        background: #f8fafe;
        border-radius: 20px;
        padding: 15px;
        border: 1px solid #eef2ff;
        transition: 0.3s;
    }
    
    .user-sidebar-info:hover {
        background: #ffffff;
        box-shadow: 0 10px 25px rgba(112, 144, 176, 0.1);
    }

    .user-avatar-sm {
        width: 45px;
        height: 45px;
        background: linear-gradient(135deg, #4361ee, #4cc9f0);
        color: white;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        box-shadow: 0 4px 10px rgba(67, 97, 238, 0.2);
    }

    .logout-link:hover {
        background-color: #fff5f5 !important;
        color: #dc3545 !important;
    }
</style>

<div class="px-4 mb-3 mt-2">
    <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 1.5px; opacity: 0.6;">
        Main Navigation
    </small>
</div>

<ul class="nav nav-pills-custom flex-column mb-auto">
    <li class="nav-item">
        <a class="nav-link <?= (url_is('/') || url_is('dashboard')) ? 'active' : '' ?>" href="<?= base_url('/') ?>">
            <i class="bi bi-grid-1x2-fill me-3"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('users*') ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
            <i class="bi bi-people-fill me-3"></i> <span>Manajemen Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('pengaduan*') ? 'active' : '' ?>" href="<?= base_url('pengaduan') ?>">
            <i class="bi bi-chat-left-dots-fill me-3"></i> <span>Pengaduan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('tanggapan*') ? 'active' : '' ?>" href="<?= base_url('tanggapan') ?>">
            <i class="bi bi-chat-square-check-fill me-3"></i> <span>Tanggapan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('penugasan*') ? 'active' : '' ?>" href="<?= base_url('penugasan') ?>">
            <i class="bi bi-tools me-3"></i> <span>Penugasan</span>
        </a>
    </li>

    <div class="px-4 my-4">
        <small class="text-uppercase fw-bold text-muted" style="font-size: 0.65rem; letter-spacing: 1.5px; opacity: 0.6;">
            Personal
        </small>
    </div>

    <?php $idu = session('id_user'); ?>
    <li class="nav-item">
        <a class="nav-link <?= url_is('users/edit/' . $idu) ? 'active' : '' ?>" href="<?= base_url('users/edit/' . $idu) ?>">
            <i class="bi bi-person-gear me-3"></i> <span>Account Settings</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link logout-link text-danger" href="<?= base_url('/logout') ?>" onclick="return confirm('Yakin ingin keluar?')">
            <i class="bi bi-box-arrow-left me-3"></i> <span>Log Out</span>
        </a>
    </li>
</ul>

<div class="user-sidebar-info mx-3 mt-5 mb-3">
    <div class="d-flex align-items-center">
        <?php if (session()->get('foto')): ?>
            <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" 
                 style="width: 42px; height: 42px; object-fit: cover;" 
                 class="rounded-3 me-3 border border-2 border-white shadow-sm" />
        <?php else: ?>
            <div class="user-avatar-sm me-3">
                <?= strtoupper(substr(session('nama'), 0, 1)); ?>
            </div>
        <?php endif; ?>
        
        <div style="overflow: hidden;">
            <p class="mb-0 fw-bold text-truncate" style="font-size: 0.85rem; color: #2b3674;">
                <?= session('nama'); ?>
            </p>
            <div class="d-flex align-items-center">
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle" style="font-size: 0.6rem; font-weight: 700;">
                    <?= strtoupper(session('role')); ?>
                </span>
            </div>
        </div>
    </div>
</div>