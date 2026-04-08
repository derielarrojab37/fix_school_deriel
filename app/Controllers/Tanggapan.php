<?php

namespace App\Controllers;

use App\Models\TanggapanModel;

class Tanggapan extends BaseController
{
    protected $tanggapan;

    public function create()
    {
        $pengaduanModel = new PengaduanModel();

        return view('tanggapan/create', [
        'pengaduan' => $pengaduanModel->findAll()
    ]);
    }
    public function edit($id)
{
    $model = new TanggapanModel();
    $pengaduanModel = new PengaduanModel();

    return view('tanggapan/edit', [
        'tanggapan' => $model->find($id),
        'pengaduan' => $pengaduanModel->findAll()
    ]);
}
}