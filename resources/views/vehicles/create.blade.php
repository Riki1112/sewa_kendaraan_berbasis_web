<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --success: #16a34a;
            --success-dark: #15803d;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #f4f7fb;
            --card-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .page-wrapper {
            padding: 42px 0;
        }

        .form-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        .form-header {
            background: linear-gradient(135deg, #0f172a, #15803d 58%, #16a34a);
            color: white;
            padding: 28px 30px;
        }

        .form-header h4 {
            margin: 0 0 8px 0;
            font-size: 2rem;
            font-weight: 800;
        }

        .form-header p {
            margin: 0;
            color: rgba(255,255,255,0.88);
        }

        .form-body {
            padding: 30px;
        }

        .section-card {
            background: #fbfdff;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 18px;
        }

        .form-label {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            min-height: 48px;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 12px 14px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.12);
        }

        textarea.form-control {
            min-height: 120px;
        }

        .upload-box {
            background: linear-gradient(180deg, #f8fafc, #eff6ff);
            border: 1px dashed #93c5fd;
            border-radius: 18px;
            padding: 18px;
        }

        .upload-note {
            color: var(--muted);
            font-size: 0.92rem;
            margin-top: 10px;
            margin-bottom: 0;
        }

        .action-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 8px;
        }

        .btn-save {
            background: linear-gradient(90deg, var(--success), var(--success-dark));
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .btn-save:hover {
            background: linear-gradient(90deg, var(--success-dark), #166534);
            color: white;
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 22px;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .form-header {
                padding: 22px;
            }

            .form-header h4 {
                font-size: 1.6rem;
            }

            .form-body {
                padding: 20px;
            }

            .section-card {
                padding: 18px;
            }
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="form-card">
                <div class="form-header">
                    <h4>Tambah Kendaraan</h4>
                    <p>Lengkapi informasi kendaraan dengan detail yang rapi agar data mudah dikelola di sistem admin.</p>
                </div>

                <div class="form-body">
                    <form action="/vehicles/store" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="section-card">
                            <div class="section-title">Informasi Dasar</div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nama Kendaraan</label>
                                    <input type="text" name="nama_kendaraan" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Merek</label>
                                    <input type="text" name="merek" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Plat Nomor</label>
                                    <input type="text" name="plat_nomor" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun</label>
                                    <input type="number" name="tahun" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Harga Sewa</label>
                                    <input type="number" name="harga_sewa" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status</label>
                                    <select name="status_ketersediaan" class="form-select">
                                        <option value="tersedia">Tersedia</option>
                                        <option value="tidak tersedia">Tidak Tersedia</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Spesifikasi Kendaraan</div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Warna</label>
                                    <input type="text" name="warna" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Transmisi</label>
                                    <input type="text" name="transmisi" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Bahan Bakar</label>
                                    <input type="text" name="bahan_bakar" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Kapasitas Mesin</label>
                                    <input type="number" name="kapasitas_mesin" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Jumlah Kursi</label>
                                    <input type="number" name="jumlah_kursi" class="form-control">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label class="form-label">Kilometer</label>
                                    <input type="number" name="kilometer" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Pajak dan Servis</div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tanggal Pajak</label>
                                    <input type="date" name="tanggal_pajak" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Status Servis</label>
                                    <input type="text" name="status_servis" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Terakhir Servis</label>
                                    <input type="date" name="terakhir_servis" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor STNK</label>
                                    <input type="text" name="nomor_stnk" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Rangka</label>
                                    <input type="text" name="nomor_rangka" class="form-control">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nomor Mesin</label>
                                    <input type="text" name="nomor_mesin" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Deskripsi dan Gambar</div>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="col-12 mb-3">
                                    <label class="form-label">Gambar</label>
                                    <div class="upload-box">
                                        <input type="file" name="images[]" multiple class="form-control">
                                        <p class="upload-note">Kamu bisa upload beberapa gambar sekaligus untuk galeri kendaraan.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="action-row">
                            <button class="btn btn-save">Simpan</button>
                            <a href="/vehicles" class="btn btn-outline-secondary btn-back">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>