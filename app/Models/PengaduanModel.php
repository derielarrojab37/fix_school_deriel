<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';

    protected $allowedFields = [
        'id_user',
        'judul',
        'deskripsi',
        'lokasi',
        'foto',
        'tanggal',
        'status'
    ];

    public function getPengaduan()
    {
        return $this->select('pengaduan.*, users.nama')
            ->join('users', 'users.id_user = pengaduan.id_user')
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    public function getDetail($id)
    {
        return $this->select('pengaduan.*, users.nama')
            ->join('users', 'users.id_user = pengaduan.id_user')
            ->where('id_pengaduan', $id)
            ->first();
    }
}