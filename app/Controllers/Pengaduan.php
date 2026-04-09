<?php

namespace App\Controllers;

use App\Models\PengaduanModel;
use App\Models\TanggapanModel;

class Pengaduan extends BaseController
{
    protected $pengaduanModel;
    protected $tanggapanModel;

    public function __construct()
    {
        $this->pengaduanModel = new PengaduanModel();
        $this->tanggapanModel = new TanggapanModel();
    }

    public function index()
    {
        $data['pengaduan'] = $this->pengaduanModel->getPengaduan();
        return view('pengaduan/index', $data);
    }

    public function create()
    {
        return view('pengaduan/create');
    }

    public function store()
{
    $file = $this->request->getFile('foto');
    $namaFoto = null;

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $namaFoto = $file->getRandomName();
        // Simpan ke public/uploads/pengaduan agar bisa diakses browser
        $file->move(FCPATH . 'uploads/pengaduan', $namaFoto);
    }

    $this->pengaduanModel->save([
        'id_user'   => session()->get('id_user'),
        'judul'     => $this->request->getPost('judul'),
        'deskripsi' => $this->request->getPost('deskripsi'),
        'lokasi'    => $this->request->getPost('lokasi'),
        'foto'      => $namaFoto,
        'tanggal'   => date('Y-m-d H:i:s'), // Tambahkan tanggal otomatis
        'status'    => 'menunggu' 
    ]);

    return redirect()->to('/pengaduan')->with('success', 'Laporan berhasil terkirim!');
}

    public function delete($id)
    {
        $this->pengaduanModel->delete($id);
        return redirect()->to('/pengaduan');
    }

   public function detail($id)
{
    $data['pengaduan'] = $this->pengaduanModel->getDetail($id);
    $data['tanggapan'] = $this->tanggapanModel->getByPengaduan($id);

    return view('pengaduan/detail', $data);
}
    
}