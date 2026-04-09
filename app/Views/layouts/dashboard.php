<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="row mb-4">
    <div class="col-md-12">
        <h2 class="fw-bold" style="color: var(--text-dark);">Welcome back, Admin! 👋</h2>
        <p class="text-muted">Berikut adalah ringkasan sistem pengaduan hari ini.</p>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4">
        <div class="stat-card">
            <div class="icon-box">
                <i class="bi bi-megaphone"></i>
            </div>
            <div>
                <p class="stat-title">Total Aduan</p>
                <div class="stat-value">128</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="icon-box" style="color: #f6ad55;">
                <i class="bi bi-clock-history"></i>
            </div>
            <div>
                <p class="stat-title">Pending</p>
                <div class="stat-value">14</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stat-card">
            <div class="icon-box" style="color: #48bb78;">
                <i class="bi bi-check2-circle"></i>
            </div>
            <div>
                <p class="stat-title">Selesai</p>
                <div class="stat-value">114</div>
            </div>
        </div>
    </div>
</div>

<div class="alert alert-primary border-0 rounded-4 p-4 shadow-sm mb-0" style="background: linear-gradient(135deg, #4361ee, #4cc9f0); color: white;">
    <div class="d-flex align-items-center">
        <div class="flex-grow-1">
            <h5 class="fw-bold">Fix School - Digital Reporting</h5>
            <p class="mb-0 opacity-75">Gunakan panel navigasi di sebelah kiri untuk mengelola data pengaduan, memantau teknisi, dan mengatur akun pengguna.</p>
        </div>
        <i class="bi bi-shield-check display-4 opacity-50"></i>
    </div>
</div>
<?= $this->endSection() ?>