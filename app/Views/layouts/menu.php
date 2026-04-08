<ul class="nav flex-column mt-3">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <b>Fix </b>School <i class="bi bi-yelp"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/') ?>">
            <i class="bi bi-house"></i> <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="<?= site_url('/logout') ?>">
            <i class="bi bi-house"></i> <span>Log Out</span>
        </a>
    </li>
         <li class="nav-item">
        <a class="nav-link" href="<?= base_url('/users') ?>">
            <i class="bi bi-people"></i> <span>Users</span>
        </a>
    </li>
        <?php $idu = session('id_user'); ?>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('users/edit/' . $idu) ?>">
            <i class="bi bi-person-gear"></i> <span>Setting</span>
        </a>
    </li>  
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('pengaduan') ?>">
            <i class="bi bi-exclamation-circle"></i>
            <span>Pengaduan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('tanggapan') ?>">
            <i class="bi bi-exclamation-circle"></i>
            <span>Tanggapan</span>
        </a>
    </li>

</ul>
<li class="nav-item mt-3">
    <span class="nav-link disabled">Masuk sebagai: <b><?= session('nama'); ?> (<?= session('role'); ?>)</b></span>
</li>

<center>
    <img src="<?= base_url('uploads/users/' . session()->get('foto')) ?>" height="80" class="mt-3 rounded-circle" />
</center>