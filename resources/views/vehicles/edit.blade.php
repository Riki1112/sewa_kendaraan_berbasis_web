<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --warning: #f59e0b;
            --warning-dark: #d97706;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #f4f7fb;
            --card-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
            --danger: #ef4444;
            --danger-dark: #dc2626;
            --success-bg: #dcfce7;
            --success-text: #166534;
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .page-wrapper {
            padding: 42px 0;
        }

        .edit-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        .edit-header {
            background: linear-gradient(135deg, #0f172a, #d97706 58%, #f59e0b);
            color: white;
            padding: 28px 30px;
        }

        .edit-header h2 {
            margin: 0 0 8px 0;
            font-size: 2rem;
            font-weight: 800;
        }

        .edit-header p {
            margin: 0;
            color: rgba(255,255,255,0.88);
        }

        .edit-body {
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

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
        }

        .image-card {
            border: 1px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            background: white;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
            transition: all 0.2s ease;
        }

        .image-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 26px rgba(15, 23, 42, 0.08);
        }

        .image-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            display: block;
            background: #f8fafc;
        }

        .image-card .card-actions {
            padding: 12px;
            background: #fff;
        }

        .btn-delete-image {
            background: linear-gradient(90deg, var(--danger), var(--danger-dark));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
        }

        .btn-delete-image:hover {
            color: white;
            background: linear-gradient(90deg, var(--danger-dark), #b91c1c);
        }

        .empty-gallery {
            background: #f8fafc;
            border: 1px dashed var(--border);
            border-radius: 16px;
            padding: 18px;
            color: var(--muted);
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

        .btn-update {
            background: linear-gradient(90deg, var(--warning), var(--warning-dark));
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .btn-update:hover {
            background: linear-gradient(90deg, var(--warning-dark), #b45309);
            color: white;
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 22px;
            font-weight: 700;
        }

        .alert {
            border-radius: 16px;
        }

        @media (max-width: 991px) {
            .gallery-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 768px) {
            .edit-header {
                padding: 22px;
            }

            .edit-header h2 {
                font-size: 1.6rem;
            }

            .edit-body {
                padding: 20px;
            }

            .section-card {
                padding: 18px;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 480px) {
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            @if(session('success'))
                <div class="alert alert-success shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card edit-card">
                <div class="edit-header">
                    <h2>Edit Kendaraan</h2>
                    <p>Perbarui data kendaraan, kelola galeri gambar, dan pastikan informasi kendaraan tetap akurat di sistem.</p>
                </div>

                <div class="edit-body">
                    <form action="/vehicles/update/{{ $vehicle->id }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="section-card">
                            <div class="section-title">Informasi Dasar</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Nama Kendaraan</label>
                                    <input type="text" name="nama_kendaraan" class="form-control" value="{{ $vehicle->nama_kendaraan }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Merek</label>
                                    <input type="text" name="merek" class="form-control" value="{{ $vehicle->merek }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Plat Nomor</label>
                                    <input type="text" name="plat_nomor" class="form-control" value="{{ $vehicle->plat_nomor }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Tahun</label>
                                    <input type="number" name="tahun" class="form-control" value="{{ $vehicle->tahun }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Harga Sewa</label>
                                    <input type="number" name="harga_sewa" class="form-control" value="{{ $vehicle->harga_sewa }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status Ketersediaan</label>
                                    <select name="status_ketersediaan" class="form-select">
                                        <option value="tersedia" {{ $vehicle->status_ketersediaan == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                                        <option value="tidak tersedia" {{ $vehicle->status_ketersediaan == 'tidak tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Spesifikasi Kendaraan</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Warna</label>
                                    <input type="text" name="warna" class="form-control" value="{{ $vehicle->warna }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Transmisi</label>
                                    <input type="text" name="transmisi" class="form-control" value="{{ $vehicle->transmisi }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Bahan Bakar</label>
                                    <input type="text" name="bahan_bakar" class="form-control" value="{{ $vehicle->bahan_bakar }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Kapasitas Mesin</label>
                                    <input type="number" name="kapasitas_mesin" class="form-control" value="{{ $vehicle->kapasitas_mesin }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Kursi</label>
                                    <input type="number" name="jumlah_kursi" class="form-control" value="{{ $vehicle->jumlah_kursi }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Kilometer</label>
                                    <input type="number" name="kilometer" class="form-control" value="{{ $vehicle->kilometer }}">
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Pajak, Servis, dan Identitas</div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Pajak</label>
                                    <input type="date" name="tanggal_pajak" class="form-control" value="{{ $vehicle->tanggal_pajak }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Status Servis</label>
                                    <input type="text" name="status_servis" class="form-control" value="{{ $vehicle->status_servis }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Terakhir Servis</label>
                                    <input type="date" name="terakhir_servis" class="form-control" value="{{ $vehicle->terakhir_servis }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nomor STNK</label>
                                    <input type="text" name="nomor_stnk" class="form-control" value="{{ $vehicle->nomor_stnk }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nomor Rangka</label>
                                    <input type="text" name="nomor_rangka" class="form-control" value="{{ $vehicle->nomor_rangka }}">
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nomor Mesin</label>
                                    <input type="text" name="nomor_mesin" class="form-control" value="{{ $vehicle->nomor_mesin }}">
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Deskripsi</div>
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control">{{ $vehicle->deskripsi }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="section-card">
                            <div class="section-title">Galeri Gambar Saat Ini</div>

                            @forelse($vehicle->images as $img)
                                @if($loop->first)
                                    <div class="gallery-grid">
                                @endif

                                <div class="image-card">
                                    <img src="{{ asset('storage/' . $img->image) }}" alt="Gambar Kendaraan">
                                    <div class="card-actions">
                                        <button type="button"
                                                class="btn btn-delete-image btn-sm w-100"
                                                data-image-id="{{ $img->id }}"
                                                onclick="deleteVehicleImage(this.dataset.imageId)">
                                            Hapus Gambar
                                        </button>
                                    </div>
                                </div>

                                @if($loop->last)
                                    </div>
                                @endif
                            @empty
                                @if($vehicle->gambar)
                                    <div class="gallery-grid">
                                        <div class="image-card">
                                            <img src="{{ asset('images/' . $vehicle->gambar) }}" alt="Gambar Lama">
                                        </div>
                                    </div>
                                @else
                                    <div class="empty-gallery">
                                        Belum ada gambar kendaraan.
                                    </div>
                                @endif
                            @endforelse
                        </div>

                        <div class="section-card">
                            <div class="section-title">Tambah Gambar Baru</div>
                            <div class="upload-box">
                                <input type="file" name="images[]" multiple class="form-control" accept="image/*">
                                <p class="upload-note">Bisa pilih beberapa gambar sekaligus untuk menambah galeri kendaraan.</p>
                            </div>
                        </div>

                        <div class="action-row">
                            <button type="submit" class="btn btn-update">Update Kendaraan</button>
                            <a href="/vehicles" class="btn btn-outline-secondary btn-back">Kembali</a>
                        </div>
                    </form>

                    <form id="deleteImageForm" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function deleteVehicleImage(imageId) {
        if (confirm('Hapus gambar ini?')) {
            const form = document.getElementById('deleteImageForm');
            form.action = '/vehicles/image/delete/' + imageId;
            form.submit();
        }
    }
</script>

</body>
</html>