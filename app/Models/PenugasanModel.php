<?php

namespace App\Models;

use CodeIgniter\Model;

class PenugasanModel extends Model
{
    protected $table = 'penugasan';
    protected $primaryKey = 'id_penugasan';

    protected $allowedFields = [
        'id_pengaduan',
        'id_teknisi',
        'tanggal_tugas',
        'status_tugas'
    ];

    public function getPenugasan()
{
    return $this->select('penugasan.*, pengaduan.judul, users.nama as teknisi, tanggapan.isi_tanggapan')
        ->join('pengaduan', 'pengaduan.id_pengaduan = penugasan.id_pengaduan')
        ->join('users', 'users.id_user = penugasan.id_teknisi')
        ->join('tanggapan', 'tanggapan.id_tanggapan = penugasan.id_tanggapan')
        ->findAll();
}

    public function getByPengaduan($id)
    {
        return $this->where('id_pengaduan', $id)
            ->join('users', 'users.id_user = penugasan.id_teknisi')
            ->findAll();
    }
}