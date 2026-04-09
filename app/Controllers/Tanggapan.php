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
    // 🔒 Cek role dulu
    if (session()->get('role') != 'admin') {
        return redirect()->back();
    }

    $id_pengaduan = $this->request->getPost('id_pengaduan');

    $this->tanggapanModel->save([
        'id_pengaduan' => $id_pengaduan,
        'id_user' => session()->get('id_user'),
        'isi_tanggapan' => $this->request->getPost('isi_tanggapan'),
    ]);

    // 🔥 update status jadi diproses
    $db = \Config\Database::connect();
    $db->table('pengaduan')
        ->where('id_pengaduan', $id_pengaduan)
        ->update(['status' => 'diproses']);

    return redirect()->to('/pengaduan/detail/' . $id_pengaduan);
}
    public function delete($id)
    {
        $this->TanggapanModel->delete($id);
        return redirect()->to('/tanggapan');
    }
}