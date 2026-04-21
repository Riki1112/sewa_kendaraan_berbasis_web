<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #f4f7fb;
            --card-shadow: 0 16px 36px rgba(15, 23, 42, 0.08);
            --success-bg: #dcfce7;
            --success-text: #166534;
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .page-wrapper {
            padding: 40px 0;
        }

        .booking-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .booking-header {
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #2563eb);
            color: white;
            padding: 26px 30px;
        }

        .booking-header h4 {
            margin-bottom: 6px;
            font-size: 2rem;
            font-weight: 800;
        }

        .booking-header p {
            margin-bottom: 0;
            color: rgba(255,255,255,0.88);
        }

        .booking-body {
            padding: 28px;
        }

        .section-title {
            font-size: 1.15rem;
            font-weight: 800;
            margin-bottom: 18px;
            color: var(--dark);
        }

        .vehicle-panel {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 20px;
            height: 100%;
        }

        .vehicle-image-wrap {
            background: white;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 16px;
            height: 280px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .vehicle-image-wrap img {
            max-width: 100%;
            max-height: 240px;
            object-fit: contain;
            border-radius: 14px;
        }

        .vehicle-name {
            font-size: 1.7rem;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .vehicle-brand {
            color: var(--muted);
            margin-bottom: 16px;
        }

        .info-box {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 14px 16px;
            margin-bottom: 12px;
        }

        .info-label {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 4px;
        }

        .info-value {
            font-size: 1.02rem;
            font-weight: 700;
            color: var(--dark);
        }

        .status-pill {
            display: inline-block;
            padding: 8px 12px;
            border-radius: 999px;
            background: var(--success-bg);
            color: var(--success-text);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: capitalize;
        }

        .form-panel {
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 24px;
            background: white;
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
            min-height: 110px;
        }

        .readonly-box {
            background: #f8fafc;
        }

        .summary-box {
            background: #f8fbff;
            border: 1px solid #dbeafe;
            border-radius: 18px;
            padding: 18px;
            margin-top: 8px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 10px;
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-total {
            border-top: 1px solid #dbeafe;
            padding-top: 12px;
            margin-top: 12px;
            font-size: 1.08rem;
            font-weight: 800;
            color: var(--primary);
        }

        .action-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 24px;
        }

        .btn-main {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 700;
        }

        .btn-main:hover {
            color: white;
            background: linear-gradient(90deg, var(--primary-dark), #1e40af);
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 700;
        }

        .small-note {
            color: var(--muted);
            font-size: 0.92rem;
            margin-top: 10px;
        }

        @media (max-width: 768px) {
            .booking-header {
                padding: 22px;
            }

            .booking-header h4 {
                font-size: 1.55rem;
            }

            .booking-body {
                padding: 20px;
            }

            .vehicle-name {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <div class="booking-card">
                <div class="booking-header">
                    <h4>Booking Kendaraan</h4>
                    <p>Lengkapi data penyewa dan jadwal booking untuk melanjutkan pemesanan kendaraan.</p>
                </div>

                <div class="booking-body">
                    <form action="/booking/store" method="POST">
                        @csrf

                        <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">

                        <div class="row g-4">
                            <div class="col-lg-5">
                                <div class="vehicle-panel">
                                    <div class="section-title">Informasi Kendaraan</div>

                                    <div class="vehicle-image-wrap">
                                        <img src="{{ asset('images/'.$vehicle->gambar) }}" alt="{{ $vehicle->nama_kendaraan }}">
                                    </div>

                                    <div class="vehicle-name">{{ $vehicle->nama_kendaraan }}</div>
                                    <div class="vehicle-brand">{{ $vehicle->merek }}</div>

                                    <div class="info-box">
                                        <div class="info-label">Plat Nomor</div>
                                        <div class="info-value">{{ $vehicle->plat_nomor }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">Tahun</div>
                                        <div class="info-value">{{ $vehicle->tahun }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">Harga Sewa / Hari</div>
                                        <div class="info-value">Rp {{ number_format($vehicle->harga_sewa, 0, ',', '.') }}</div>
                                    </div>

                                    <div class="info-box">
                                        <div class="info-label">Status</div>
                                        <div class="info-value">
                                            <span class="status-pill">{{ $vehicle->status_ketersediaan }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-7">
                                <div class="form-panel">
                                    <div class="section-title">Data Penyewa</div>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Nama Lengkap</label>
                                            <input type="text" name="nama_penyewa" class="form-control" placeholder="Masukkan nama lengkap" value="{{ old('nama_penyewa', auth()->user()->name ?? '') }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" value="{{ old('email', auth()->user()->email ?? '') }}">
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Nomor HP</label>
                                            <input type="text" name="nomor_hp" class="form-control" placeholder="Contoh: 081234567890" value="{{ old('nomor_hp') }}" required>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat singkat" value="{{ old('alamat') }}" required>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Alamat Lengkap / Catatan Alamat</label>
                                            <textarea name="alamat_lengkap" class="form-control" placeholder="Masukkan alamat lengkap, patokan, atau detail tambahan">{{ old('alamat_lengkap') }}</textarea>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="section-title">Detail Kendaraan</div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Nama Kendaraan</label>
                                            <input type="text" class="form-control readonly-box" value="{{ $vehicle->nama_kendaraan }}" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Merek</label>
                                            <input type="text" class="form-control readonly-box" value="{{ $vehicle->merek }}" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Plat Nomor</label>
                                            <input type="text" class="form-control readonly-box" value="{{ $vehicle->plat_nomor }}" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tahun</label>
                                            <input type="text" class="form-control readonly-box" value="{{ $vehicle->tahun }}" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Harga Sewa / Hari</label>
                                            <input type="text" class="form-control readonly-box" value="Rp {{ number_format($vehicle->harga_sewa, 0, ',', '.') }}" readonly>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Status</label>
                                            <input type="text" class="form-control readonly-box" value="{{ $vehicle->status_ketersediaan }}" readonly>
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="section-title">Jadwal Booking</div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tanggal Mulai</label>
                                            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Tanggal Selesai</label>
                                            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Catatan Tambahan</label>
                                        <textarea name="catatan" class="form-control" placeholder="Contoh: booking untuk perjalanan dinas, luar kota, atau kebutuhan khusus lainnya">{{ old('catatan') }}</textarea>
                                    </div>

                                    <div class="summary-box">
                                        <div class="summary-row">
                                            <span>Harga per hari</span>
                                            <strong>Rp {{ number_format($vehicle->harga_sewa, 0, ',', '.') }}</strong>
                                        </div>
                                        <div class="summary-row">
                                            <span>Durasi</span>
                                            <strong id="durasiText">-</strong>
                                        </div>
                                        <div class="summary-row summary-total">
                                            <span>Estimasi Total</span>
                                            <strong id="estimasiTotal">Rp 0</strong>
                                        </div>
                                    </div>

                                    <div class="small-note">
                                        Pastikan data penyewa dan tanggal booking sudah benar sebelum melanjutkan proses pemesanan.
                                    </div>

                                    <div class="action-row">
                                        <button type="submit" class="btn btn-main">Lanjut Booking</button>
                                        <a href="/vehicles/detail/{{ $vehicle->id }}" class="btn btn-outline-secondary btn-back">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<div id="bookingData" data-harga="{{ $vehicle->harga_sewa }}"></div>

<script>
    const bookingData = document.getElementById('bookingData');
    const hargaPerHari = parseInt(bookingData.dataset.harga || 0);

    const tanggalMulaiInput = document.querySelector('input[name="tanggal_mulai"]');
    const tanggalSelesaiInput = document.querySelector('input[name="tanggal_selesai"]');
    const durasiText = document.getElementById('durasiText');
    const estimasiTotal = document.getElementById('estimasiTotal');

    function formatRupiah(angka) {
        return 'Rp ' + angka.toLocaleString('id-ID');
    }

    function hitungEstimasi() {
        const mulaiValue = tanggalMulaiInput.value;
        const selesaiValue = tanggalSelesaiInput.value;

        if (!mulaiValue || !selesaiValue) {
            durasiText.textContent = '-';
            estimasiTotal.textContent = 'Rp 0';
            return;
        }

        const mulai = new Date(mulaiValue);
        const selesai = new Date(selesaiValue);

        if (selesai >= mulai) {
            const selisih = selesai - mulai;
            const hari = Math.floor(selisih / (1000 * 60 * 60 * 24)) + 1;
            const total = hari * hargaPerHari;

            durasiText.textContent = hari + ' hari';
            estimasiTotal.textContent = formatRupiah(total);
        } else {
            durasiText.textContent = '-';
            estimasiTotal.textContent = 'Rp 0';
        }
    }

    tanggalMulaiInput.addEventListener('change', hitungEstimasi);
    tanggalSelesaiInput.addEventListener('change', hitungEstimasi);

    hitungEstimasi();
</script>

</body>
</html>