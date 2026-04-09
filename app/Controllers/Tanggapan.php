<?php

namespace App\Controllers;

use App\Models\TanggapanModel;

class Tanggapan extends BaseController
{
    protected $tanggapanModel;

    public function __construct()
    {
        $this->tanggapanModel = new TanggapanModel();
    }

    public function index()
    {
        $data['tanggapan'] = $this->tanggapanModel->getTanggapan();
        return view('tanggapan/index', $data);
    }

    public function create($id_pengaduan)
    {
        return view('tanggapan/create', [
            'id_pengaduan' => $id_pengaduan
        ]);
    }

   public function store()
{
    $id_pengaduan = $this->request->getPost('id_pengaduan');
    $aksi = $this->request->getPost('aksi'); // Kita tambah input 'aksi'

    // Simpan pesan penolakan/tanggapan ke tabel tanggapan
    $this->tanggapanModel->save([
        'id_pengaduan' => $id_pengaduan,
        'id_user'      => session()->get('id_user'),
        'isi_tanggapan' => $this->request->getPost('isi_tanggapan'),
    ]);

    // Tentukan status berdasarkan tombol yang diklik
    $statusBaru = ($aksi == 'tolak') ? 'ditolak' : 'diproses';

    $db = \Config\Database::connect();
    $db->table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update(['status' => $statusBaru]);

    return redirect()->to('/pengaduan/detail/' . $id_pengaduan)->with('message', 'Status laporan diperbarui.');
}
   // --- Tambahkan Method Edit ---
public function edit($id)
{
    // Kita butuh data tanggapan itu sendiri dan daftar pengaduan untuk dropdown
    $data['tanggapan'] = $this->tanggapanModel->find($id);
    
    // Kita butuh model Pengaduan untuk mengisi dropdown di view edit
    $pengaduanModel = new \App\Models\PengaduanModel(); 
    $data['pengaduan'] = $pengaduanModel->findAll();

    return view('tanggapan/edit', $data);
}

// --- Tambahkan Method Update ---
public function update($id)
{
    $id_pengaduan = $this->request->getPost('id_pengaduan');
    
    $this->tanggapanModel->update($id, [
        'id_pengaduan' => $id_pengaduan,
        'isi_tanggapan' => $this->request->getPost('isi_tanggapan'),
    ]);

    return redirect()->to('/tanggapan')->with('message', 'Tanggapan berhasil diubah');
}

// --- Perbaikan Method Delete (Typo Fix) ---
public function delete($id)
{
    // Pastikan pakai t kecil sesuai dengan __construct
    $this->tanggapanModel->delete($id); 
    return redirect()->to('/tanggapan');
}

public function detail_pengaduan($id)
{
    // Pastikan model sudah didefinisikan di constructor atau panggil di sini
    $pengaduanModel = new \App\Models\PengaduanModel();
    $tanggapanModel = new \App\Models\TanggapanModel();

    $data = [
        'title'     => 'Detail & Moderasi Pengaduan',
        'pengaduan' => $pengaduanModel->find($id),
        'tanggapan' => $tanggapanModel->where('id_pengaduan', $id)
                                      ->select('tanggapan.*, users.nama')
                                      ->join('users', 'users.id_user = tanggapan.id_user')
                                      ->findAll(),
    ];

    if (empty($data['pengaduan'])) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengaduan tidak ditemukan.');
    }

    return view('tanggapan/detail_pengaduan', $data);
}
}