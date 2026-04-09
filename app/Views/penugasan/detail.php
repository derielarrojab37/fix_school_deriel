<?php if(session('role') == 'admin'): ?>
<a href="<?= base_url('penugasan/create/' . $pengaduan['id_pengaduan']) ?>" 
   class="btn btn-warning">
   Tugaskan Teknisi
</a>
<?php endif; ?>

<?php if(session('role') == 'admin'): ?>
<a href="<?= base_url('penugasan/from-tanggapan/' . $t['id_tanggapan']) ?>" 
   class="btn btn-warning btn-sm">
   Tugaskan
</a>
<?php endif; ?>