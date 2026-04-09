<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<style>
    .response-card {
        background: #ffffff;
        border-radius: 24px;
        border: none;
        box-shadow: 0 15px 35px rgba(112, 144, 176, 0.1);
        overflow: hidden;
        animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .response-header {
        background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        padding: 30px;
        color: white;
    }

    .form-label {
        font-weight: 700;
        color: #2b3674;
        font-size: 0.9rem;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
    }

    .form-label i {
        margin-right: 10px;
        color: #4361ee;
    }

    .form-control {
        border-radius: 16px;
        padding: 15px 20px;
        border: 1px solid #e0e5f2;
        background-color: #f8fafe;
        transition: all 0.3s;
        resize: none;
    }

    .form-control:focus {
        background-color: #fff;
        border-color: #4361ee;
        box-shadow: 0 0 0 4px rgba(67, 97, 238, 0.1);
    }

    .btn-send {
        background: #4361ee;
        border: none;
        padding: 12px 30px;
        border-radius: 12px;
        font-weight: 700;
        color: white;
        transition: 0.3s;
        box-shadow: 0 8px 20px rgba(67, 97, 238, 0.2);
    }

    .btn-send:hover {
        background: #3a0ca3;
        transform: translateY(-2px);
        box-shadow: 0 12px 25px rgba(67, 97, 238, 0.3);
    }

    .alert-info-soft {
        background: #f0f7ff;
        border: none;
        border-left: 4px solid #4361ee;
        border-radius: 12px;
        color: #2b3674;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url('pengaduan') ?>" class="text-decoration-none text-muted">Laporan</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('pengaduan/detail/' . $id_pengaduan) ?>" class="text-decoration-none text-muted">Detail</a></li>
                    <li class="breadcrumb-item active fw-bold" aria-current="page">Tambah Tanggapan</li>
                </ol>
            </nav>

            <div class="response-card">
                <div class="response-header">
                    <div class="d-flex align-items-center">
                        <div class="bg-white bg-opacity-20 rounded-circle p-3 me-3">
                            <i class="bi bi-chat-right-quote-fill fs-3 text-white"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">Berikan Tanggapan</h4>
                            <p class="mb-0 opacity-75 small">Berikan informasi terbaru mengenai laporan ini</p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    <div class="alert alert-info-soft mb-4 d-flex align-items-center">
                        <i class="bi bi-info-circle-fill fs-5 me-3"></i>
                        <small>Tanggapan Anda akan muncul di riwayat laporan dan dapat dilihat oleh pelapor.</small>
                    </div>

                    <form action="<?= base_url('tanggapan/store') ?>" method="post">
                        <input type="hidden" name="id_pengaduan" value="<?= $id_pengaduan ?>">

                        <div class="mb-4">
                            <label class="form-label">
                                <i class="bi bi-pencil-square"></i> Pesan Tanggapan
                            </label>
                            <textarea 
                                name="isi_tanggapan" 
                                class="form-control" 
                                rows="6" 
                                placeholder="Tuliskan solusi atau progres perbaikan di sini..." 
                                required
                            ></textarea>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="<?= base_url('pengaduan/detail/' . $id_pengaduan) ?>" class="text-muted text-decoration-none small fw-bold">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Detail
                            </a>
                            <button type="submit" class="btn btn-send">
                                Kirim Tanggapan <i class="bi bi-send-fill ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mt-4 p-4 rounded-4 bg-white shadow-sm border-0 d-flex align-items-start">
                <div class="text-warning me-3">
                    <i class="bi bi-exclamation-triangle-fill fs-4"></i>
                </div>
                <div>
                    <h6 class="fw-bold mb-1">Catatan Penting</h6>
                    <p class="text-muted small mb-0">
                        Setiap tanggapan akan terekam secara permanen sebagai log audit sistem. Pastikan data yang disampaikan valid dan akurat.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>