<?php

namespace App\Models;

use CodeIgniter\Model;

class TanggapanModel extends Model
{
    protected $table = 'tanggapan';
    protected $primaryKey = 'id_tanggapan';

    protected $allowedFields = [
        'id_pengaduan',
        'id_user',
        'isi_tanggapan',
        'tanggal'
    ];

    protected $useTimestamps = false; // karena pakai field tanggal manual

    // 🔥 JOIN ke pengaduan & user (biar tampil nama, bukan ID)
    public function getTanggapanWithRelasi()
    {
        return $this->select('tanggapan.*, pengaduan.judul, user.nama')
                    ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
                    ->join('user', 'user.id_user = tanggapan.id_user')
                    ->findAll();
    }
}