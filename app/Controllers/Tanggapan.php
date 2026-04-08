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
        $this->tanggapanModel->save([
            'id_pengaduan' => $this->request->getPost('id_pengaduan'),
            'id_user' => session()->get('id_user'),
            'isi_tanggapan' => $this->request->getPost('isi_tanggapan'),
        ]);

        return redirect()->to('/tanggapan');
    }

    public function delete($id)
    {
        $this->tanggapanModel->delete($id);
        return redirect()->to('/tanggapan');
    }
}