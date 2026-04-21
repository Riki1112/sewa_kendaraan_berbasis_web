<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #f4f7fb;
            --card-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
            --success-bg: #dcfce7;
            --success-text: #166534;
            --danger-bg: #fee2e2;
            --danger-text: #991b1b;
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .navbar-brand {
            font-size: 1.55rem;
            font-weight: 800;
            color: var(--dark) !important;
            letter-spacing: -0.4px;
        }

        .navbar-brand span {
            color: var(--primary);
        }

        .user-greeting {
            color: var(--muted);
            font-weight: 500;
        }

        .user-greeting strong {
            color: var(--dark);
        }

        .btn-logout {
            border-radius: 12px;
            padding: 8px 16px;
            font-weight: 600;
        }

        .page-wrapper {
            padding: 36px 0 46px;
        }

        .page-title {
            font-size: 3rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 24px;
            letter-spacing: -0.8px;
        }

        .detail-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .gallery-panel {
            padding: 28px;
            border-right: 1px solid #edf2f7;
            background: linear-gradient(180deg, #fbfdff, #f8fbff);
            height: 100%;
        }

        .main-image-wrap {
            background: white;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 18px;
            min-height: 360px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
            box-shadow: inset 0 0 0 1px rgba(255,255,255,0.2);
        }

        .main-image-wrap img {
            max-width: 100%;
            max-height: 320px;
            width: auto;
            object-fit: contain;
            border-radius: 16px;
            transition: opacity 0.2s ease;
        }

        .thumb-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
        }

        .thumb-item {
            background: white;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 8px;
            transition: all 0.2s ease;
        }

        .thumb-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.06);
        }

        .thumbnail-image {
            width: 100%;
            height: 88px;
            object-fit: cover;
            border-radius: 12px;
            cursor: pointer;
            display: block;
            border: 2px solid transparent;
            transition: all 0.2s ease;
        }

        .thumbnail-image:hover {
            opacity: 0.9;
        }

        .active-thumb {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .detail-panel {
            padding: 30px;
        }

        .vehicle-name {
            font-size: 2.7rem;
            font-weight: 800;
            line-height: 1.08;
            margin-bottom: 10px;
            color: var(--dark);
            letter-spacing: -0.8px;
        }

        .sub-row {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 22px;
        }

        .status-pill {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 0.87rem;
            font-weight: 700;
        }

        .status-available {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .status-unavailable {
            background: var(--danger-bg);
            color: var(--danger-text);
        }

        .price-pill {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: #eff6ff;
            color: var(--primary-dark);
            font-size: 0.9rem;
            font-weight: 700;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 14px;
            margin-bottom: 24px;
        }

        .info-card {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 16px 18px;
            min-height: 86px;
        }

        .info-label {
            font-size: 0.88rem;
            color: var(--muted);
            margin-bottom: 6px;
        }

        .info-value {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.35;
            word-break: break-word;
        }

        .desc-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 18px 20px;
            margin-bottom: 24px;
        }

        .desc-title {
            font-size: 1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 10px;
        }

        .desc-text {
            color: #334155;
            margin-bottom: 0;
            line-height: 1.7;
        }

        .action-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 6px;
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 700;
        }

        .btn-disabled {
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 700;
            border: none;
            background: #cbd5e1;
            color: #475569;
        }

        @media (max-width: 991px) {
            .gallery-panel {
                border-right: none;
                border-bottom: 1px solid #edf2f7;
            }

            .vehicle-name {
                font-size: 2.1rem;
            }
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2.2rem;
            }

            .gallery-panel,
            .detail-panel {
                padding: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .thumb-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .main-image-wrap {
                min-height: 280px;
            }

            .main-image-wrap img {
                max-height: 240px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom px-4">
    <a class="navbar-brand fw-bold" href="/user/dashboard">Rental <span>Kendaraan</span></a>
    <div class="ms-auto d-flex align-items-center gap-3">
        <span class="user-greeting">Halo, <strong>{{ auth()->user()->name }}</strong></span>
        <form method="POST" action="/logout">
            @csrf
            <button class="btn btn-outline-danger btn-sm btn-logout">Logout</button>
        </form>
    </div>
</nav>

<div class="container page-wrapper">
    <h1 class="page-title">Detail Kendaraan</h1>

    <div class="detail-card">
        <div class="row g-0">

            <div class="col-lg-5">
                <div class="gallery-panel">
                    @if($vehicle->images->count() > 0)
                        @php
                            $mainImage = $vehicle->images->where('is_primary', 1)->first() ?? $vehicle->images->first();
                        @endphp

                        <div class="main-image-wrap">
                            <img id="mainVehicleImage"
                                 src="{{ asset('storage/' . $mainImage->image) }}"
                                 alt="{{ $vehicle->nama_kendaraan }}">
                        </div>

                        <div class="thumb-grid">
                            @foreach($vehicle->images as $img)
                                <div class="thumb-item">
                                    <img src="{{ asset('storage/' . $img->image) }}"
                                         class="thumbnail-image {{ $img->is_primary ? 'active-thumb' : '' }}"
                                         alt="{{ $vehicle->nama_kendaraan }}"
                                         onclick="changeMainImage(this)">
                                </div>
                            @endforeach
                        </div>

                    @elseif($vehicle->gambar)
                        <div class="main-image-wrap">
                            <img id="mainVehicleImage"
                                 src="{{ asset('images/' . $vehicle->gambar) }}"
                                 alt="{{ $vehicle->nama_kendaraan }}">
                        </div>
                    @else
                        <div class="main-image-wrap">
                            <img id="mainVehicleImage"
                                 src="https://via.placeholder.com/500x350?text=No+Image"
                                 alt="No Image">
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-7">
                <div class="detail-panel">
                    <h2 class="vehicle-name">{{ $vehicle->nama_kendaraan }}</h2>

                    <div class="sub-row">
                        @if(strtolower(trim($vehicle->status_ketersediaan)) == 'tersedia')
                            <span class="status-pill status-available">Tersedia</span>
                        @else
                            <span class="status-pill status-unavailable">Tidak Tersedia</span>
                        @endif

                        <span class="price-pill">
                            Rp {{ number_format($vehicle->harga_sewa, 0, ',', '.') }} / hari
                        </span>
                    </div>

                    <div class="info-grid">
                        <div class="info-card">
                            <div class="info-label">Merek</div>
                            <div class="info-value">{{ $vehicle->merek }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Plat Nomor</div>
                            <div class="info-value">{{ $vehicle->plat_nomor }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Tahun</div>
                            <div class="info-value">{{ $vehicle->tahun }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Warna</div>
                            <div class="info-value">{{ $vehicle->warna }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Transmisi</div>
                            <div class="info-value">{{ $vehicle->transmisi }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Bahan Bakar</div>
                            <div class="info-value">{{ $vehicle->bahan_bakar }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Kapasitas Mesin</div>
                            <div class="info-value">{{ $vehicle->kapasitas_mesin }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Jumlah Kursi</div>
                            <div class="info-value">{{ $vehicle->jumlah_kursi }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Kilometer</div>
                            <div class="info-value">{{ $vehicle->kilometer }} km</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Tanggal Pajak</div>
                            <div class="info-value">{{ $vehicle->tanggal_pajak }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Status Servis</div>
                            <div class="info-value">{{ $vehicle->status_servis }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Terakhir Servis</div>
                            <div class="info-value">{{ $vehicle->terakhir_servis }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Nomor STNK</div>
                            <div class="info-value">{{ $vehicle->nomor_stnk }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Nomor Rangka</div>
                            <div class="info-value">{{ $vehicle->nomor_rangka }}</div>
                        </div>

                        <div class="info-card">
                            <div class="info-label">Nomor Mesin</div>
                            <div class="info-value">{{ $vehicle->nomor_mesin }}</div>
                        </div>
                    </div>

                    <div class="desc-card">
                        <div class="desc-title">Deskripsi</div>
                        <p class="desc-text">{{ $vehicle->deskripsi }}</p>
                    </div>

                    <div class="action-row">
                        @if(strtolower(trim($vehicle->status_ketersediaan)) == 'tersedia')
                        @else
                            <button class="btn btn-disabled" disabled>Tidak Bisa Dibooking</button>
                        @endif

                        <a href="/user/dashboard" class="btn btn-outline-secondary btn-back">Kembali</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function changeMainImage(element) {
        const mainImage = document.getElementById('mainVehicleImage');

        if (mainImage) {
            mainImage.style.opacity = 0;

            setTimeout(() => {
                mainImage.src = element.src;
                mainImage.style.opacity = 1;
            }, 120);
        }

        document.querySelectorAll('.thumbnail-image').forEach(img => {
            img.classList.remove('active-thumb');
        });

        element.classList.add('active-thumb');
    }
</script>

</body>
</html>