<?php if(session('role') == 'admin'): ?>
<div class="mt-4 p-4 rounded-4 border-start border-4 border-warning shadow-sm" style="background: #fffdf5;">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <h6 class="fw-bold text-dark mb-1"><i class="bi bi-person-gear me-2"></i>Butuh Perbaikan Lapangan?</h6>
            <p class="text-muted small mb-0">Klik tombol di samping untuk segera menugaskan teknisi ke lokasi.</p>
        </div>
        <a href="<?= base_url('penugasan/create/' . $pengaduan['id_pengaduan']) ?>" 
           class="btn btn-warning fw-bold px-4 py-2 rounded-3 shadow-sm text-dark">
            <i class="bi bi-tools me-2"></i> Tugaskan Teknisi
        </a>
    </div>
</div>
<?php endif; ?>

<?php if(session('role') == 'admin'): ?>
<div class="mt-2 text-end">
    <a href="<?= base_url('penugasan/from-tanggapan/' . $t['id_tanggapan']) ?>" 
       class="btn btn-outline-warning btn-sm border-2 fw-bold rounded-pill px-3"
       style="font-size: 0.75rem;">
       <i class="bi bi-send-plus-fill me-1"></i> Langsung Tugaskan
    </a>
</div>
<?php endif; ?>