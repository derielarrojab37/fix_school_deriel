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

    public function getTanggapan()
    {
        return $this->select('tanggapan.*, users.nama, pengaduan.judul')
            ->join('users', 'users.id_user = tanggapan.id_user')
            ->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan')
            ->findAll();
    }

    public function getByPengaduan($id_pengaduan)
    {
        return $this->where('id_pengaduan', $id_pengaduan)
            ->join('users', 'users.id_user = tanggapan.id_user')
            ->findAll();
    }
}