<div class="px-4 mb-2">
    <small class="text-uppercase fw-bold opacity-50" style="font-size: 0.7rem; letter-spacing: 1px;">Main Menu</small>
</div>

<ul class="nav flex-column mb-auto">
    <li class="nav-item">
        <a class="nav-link <?= (url_is('/') || url_is('dashboard')) ? 'active' : '' ?>" href="<?= base_url('/') ?>">
            <i class="bi bi-grid-1x2-fill me-2"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('users*') ? 'active' : '' ?>" href="<?= base_url('/users') ?>">
            <i class="bi bi-people-fill me-2"></i> <span>Manajemen Users</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('pengaduan*') ? 'active' : '' ?>" href="<?= base_url('pengaduan') ?>">
            <i class="bi bi-chat-left-dots-fill me-2"></i> <span>Pengaduan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('tanggapan*') ? 'active' : '' ?>" href="<?= base_url('tanggapan') ?>">
            <i class="bi bi-chat-square-check-fill me-2"></i> <span>Tanggapan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link <?= url_is('penugasan*') ? 'active' : '' ?>" href="<?= base_url('penugasan') ?>">
            <i class="bi bi-tools me-2"></i> <span>Penugasan</span>
        </a>
    </li>

    <hr class="mx-4 my-3 opacity-10">

    <?php $idu = session('id_user'); ?>
    <li class="nav-item">
        <a class="nav-link <?= url_is('users/edit/' . $idu) ? 'active' : '' ?>" href="<?= base_url('users/edit/' . $idu) ?>">
            <i class="bi bi-person-gear me-2"></i> <span>Account Settings</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link text-danger" href="<?= base_url('/logout') ?>" onclick="return confirm('Yakin ingin keluar?')">
            <i class="bi bi-box-arrow-left me-2"></i> <span>Log Out</span>
        </a>
    </li>
</ul>

<div class="user-sidebar-info mx-3 mt-4 mb-3">
    <div class="d-flex align-items-center">
        <?php if (session()->get('foto')): ?>
            <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" 
                 style="width: 45px; height: 45px; object-fit: cover;" 
                 class="rounded-3 me-3 shadow-sm border border-2 border-white" />
        <?php else: ?>
            <div class="user-avatar-sm me-3">
                <?= substr(session('nama'), 0, 1); ?>
            </div>
        <?php endif; ?>
        
        <div style="overflow: hidden;">
            <p class="mb-0 fw-bold text-truncate" style="font-size: 0.85rem; color: var(--text-dark);">
                <?= session('nama'); ?>
            </p>
            <p class="mb-0 text-muted" style="font-size: 0.75rem;">
                <span class="badge bg-primary-subtle text-primary px-2" style="font-size: 0.65rem;">
                    <?= strtoupper(session('role')); ?>
                </span>
            </p>
        </div>
    </div>
</div>