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

   public function create($id_pengaduan = null)
{
    // 1. Ambil semua teknisi untuk dropdown
    $data['teknisi'] = $this->usersModel->where('role', 'teknisi')->findAll();

    // 2. Ambil data pengaduan untuk dropdown (biar form tidak kosong)
    // Kamu mungkin perlu load PengaduanModel di __construct atau di sini
    $pengaduanModel = new \App\Models\PengaduanModel();
    
    // Ambil pengaduan yang statusnya belum selesai/masih butuh teknisi
    $data['pengaduan'] = $pengaduanModel->where('status', 'pending')->findAll();

    // 3. Simpan ID yang dipilih (jika ada) ke view
    $data['selected_id'] = $id_pengaduan;

    return view('penugasan/create', $data);
}

    public function store()
{
    if (session()->get('role') != 'admin') {
        return redirect()->back();
    }

    $id_pengaduan = $this->request->getPost('id_pengaduan');

    $this->penugasanModel->save([
        'id_pengaduan'  => $id_pengaduan,
        'id_teknisi'    => $this->request->getPost('id_teknisi'), // Mengambil name="id_teknisi"
        'tanggal_tugas' => $this->request->getPost('tgl_penugasan'), // Sesuaikan dengan field di model
        'id_tanggapan'  => $this->request->getPost('id_tanggapan'), 
    ]);

    // Update status pengaduan menjadi diproses
    $db = \Config\Database::connect();
    $db->table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update(['status' => 'proses']); // Pastikan 'proses' sesuai dengan enum status di db kamu

    return redirect()->to('/penugasan')->with('success', 'Tugas berhasil didelegasikan!');
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