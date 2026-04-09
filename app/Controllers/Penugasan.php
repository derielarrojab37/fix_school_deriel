<?php

namespace App\Controllers;

use App\Models\PenugasanModel;
use App\Models\UsersModel;

class Penugasan extends BaseController
{
    protected $penugasanModel;
    protected $usersModel;

    public function __construct()
    {
        $this->penugasanModel = new PenugasanModel();
        $this->usersModel = new UsersModel();
    }

    public function index()
    {
        $data['penugasan'] = $this->penugasanModel->getPenugasan();
        return view('penugasan/index', $data);
    }

    public function create($id_pengaduan)
    {
        // ambil user dengan role teknisi
        $data['teknisi'] = $this->usersModel
            ->where('role', 'teknisi')
            ->findAll();

        $data['id_pengaduan'] = $id_pengaduan;

        return view('penugasan/create', $data);
    }

    public function store()
{
    // 🔒 hanya admin
    if (session()->get('role') != 'admin') {
        return redirect()->back();
    }

    $id_pengaduan = $this->request->getPost('id_pengaduan');

    // 🔥 SIMPAN PENUGASAN (INI YANG KAMU TANYAKAN)
    $this->penugasanModel->save([
        'id_pengaduan' => $this->request->getPost('id_pengaduan'),
        'id_tanggapan' => $this->request->getPost('id_tanggapan'),
        'id_teknisi' => $this->request->getPost('id_teknisi'),
    ]);

    // 🔥 update status pengaduan
    $db = \Config\Database::connect();
    $db->table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update(['status' => 'diproses']);

    return redirect()->to('/pengaduan/detail/' . $id_pengaduan);
}

    public function createFromTanggapan($id_tanggapan)
    {
    $tanggapanModel = new \App\Models\TanggapanModel();
    $dataTanggapan = $tanggapanModel->find($id_tanggapan);

    $data['teknisi'] = $this->usersModel
        ->where('role', 'teknisi')
        ->findAll();

    $data['id_pengaduan'] = $dataTanggapan['id_pengaduan'];
    $data['id_tanggapan'] = $id_tanggapan;

    return view('penugasan/create', $data);
    }
}