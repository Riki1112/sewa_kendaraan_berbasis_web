<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --dark-soft: #111827;
            --muted: #64748b;
            --border: #e2e8f0;
            --bg: #f4f7fb;
            --success-bg: #dcfce7;
            --success-text: #166534;
            --danger-bg: #fee2e2;
            --danger-text: #991b1b;
            --warning-bg: #fef3c7;
            --warning-text: #92400e;
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .navbar-custom {
            background: rgba(15, 23, 42, 0.96);
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .navbar-brand {
            font-size: 1.55rem;
            font-weight: 800;
            letter-spacing: -0.4px;
            color: white !important;
        }

        .nav-text {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
        }

        .btn-logout {
            border-radius: 12px;
            padding: 8px 16px;
            font-weight: 600;
        }

        .hero {
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #2563eb);
            color: white;
            border-radius: 28px;
            padding: 34px 36px;
            margin-bottom: 28px;
            box-shadow: 0 18px 42px rgba(37, 99, 235, 0.18);
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: -60px;
            right: -50px;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            background: rgba(255,255,255,0.08);
        }

        .hero h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 8px;
            position: relative;
            z-index: 1;
        }

        .hero p {
            margin-bottom: 0;
            color: rgba(255,255,255,0.88);
            position: relative;
            z-index: 1;
        }

        .hero-action {
            position: relative;
            z-index: 1;
        }

        .btn-add {
            border-radius: 14px;
            padding: 12px 18px;
            font-weight: 700;
            box-shadow: 0 10px 24px rgba(0,0,0,0.10);
        }

        .vehicle-card {
            border: 1px solid #edf2f7;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            transition: all 0.25s ease;
            height: 100%;
            background: white;
        }

        .vehicle-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.10);
        }

        .vehicle-image-wrap {
            background: linear-gradient(180deg, #f8fafc, #eef4fb);
            padding: 18px;
            height: 240px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vehicle-card img {
            max-width: 100%;
            max-height: 200px;
            width: auto;
            object-fit: contain;
            border-radius: 14px;
        }

        .card-body {
            padding: 22px;
        }

        .vehicle-title {
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 6px;
            color: var(--dark);
        }

        .vehicle-brand {
            color: var(--muted);
            font-size: 1rem;
            margin-bottom: 0;
        }

        .status-badge {
            display: inline-block;
            padding: 8px 13px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .status-available {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .status-unavailable {
            background: var(--danger-bg);
            color: var(--danger-text);
        }

        .price-box {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 16px 18px;
            margin-bottom: 18px;
        }

        .price-label {
            color: var(--muted);
            font-size: 0.95rem;
            margin-bottom: 6px;
        }

        .price-value {
            font-size: 1.55rem;
            font-weight: 800;
            color: var(--primary);
            line-height: 1.2;
        }

        .vehicle-info {
            margin-bottom: 18px;
        }

        .vehicle-info p {
            margin-bottom: 8px;
            font-size: 1.02rem;
        }

        .vehicle-info strong {
            color: var(--dark);
        }

        .btn-detail-custom {
            background: #06b6d4;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
        }

        .btn-detail-custom:hover {
            background: #0891b2;
            color: white;
        }

        .btn-edit-custom {
            background: #f59e0b;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
        }

        .btn-edit-custom:hover {
            background: #d97706;
            color: white;
        }

        .btn-delete-custom {
            background: #ef4444;
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
        }

        .btn-delete-custom:hover {
            background: #dc2626;
            color: white;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 26px 22px;
                border-radius: 22px;
            }

            .hero h1 {
                font-size: 1.9rem;
            }

            .vehicle-title {
                font-size: 1.55rem;
            }

            .navbar-brand {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom px-4 shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/admin/dashboard">Admin Panel</a>

        <div class="ms-auto d-flex align-items-center gap-3">
            <span class="nav-text">
                Halo, {{ auth()->user()->name }}
            </span>

            <form method="POST" action="/logout" class="m-0">
                @csrf
                <button class="btn btn-outline-light btn-sm btn-logout">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">
    <div class="hero d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h1>Daftar Kendaraan</h1>
            <p>Kelola data kendaraan dengan tampilan yang lebih rapi, modern, dan mudah dipantau.</p>
        </div>

        <a href="/vehicles/create" class="btn btn-light btn-add hero-action">+ Tambah Kendaraan</a>
    </div>

    <div class="row g-4">
        @foreach($vehicles as $v)
        <div class="col-md-6 col-lg-4">
            <div class="card vehicle-card">

                <div class="vehicle-image-wrap">
                    @if($v->images && $v->images->count() > 0)
                        @php
                            $mainImage = $v->images->where('is_primary', 1)->first() ?? $v->images->first();
                        @endphp

                        <img src="{{ asset('storage/' . $mainImage->image) }}"
                             alt="{{ $v->nama_kendaraan }}">
                    @elseif($v->gambar)
                        <img src="{{ asset('images/' . $v->gambar) }}"
                             alt="{{ $v->nama_kendaraan }}">
                    @else
                        <img src="https://via.placeholder.com/400x220?text=No+Image"
                             alt="No Image">
                    @endif
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3 gap-3">
                        <div>
                            <h4 class="vehicle-title">{{ $v->nama_kendaraan }}</h4>
                            <p class="vehicle-brand">{{ $v->merek }}</p>
                        </div>

                        @if(strtolower(trim($v->status_ketersediaan)) == 'tersedia')
                            <span class="status-badge status-available">Tersedia</span>
                        @else
                            <span class="status-badge status-unavailable">Tidak Tersedia</span>
                        @endif
                    </div>

                    <div class="price-box">
                        <div class="price-label">Harga Sewa / Hari</div>
                        <div class="price-value">
                            Rp {{ number_format($v->harga_sewa, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="vehicle-info">
                        <p><strong>Plat:</strong> {{ $v->plat_nomor }}</p>
                        <p><strong>Tahun:</strong> {{ $v->tahun }}</p>
                        <p><strong>Transmisi:</strong> {{ $v->transmisi }}</p>
                        <p class="mb-0"><strong>Bahan Bakar:</strong> {{ $v->bahan_bakar }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        <a href="/vehicles/detail/{{ $v->id }}" class="btn btn-detail-custom">Detail</a>

                        <div class="d-flex gap-2">
                            <a href="/vehicles/edit/{{ $v->id }}" class="btn btn-edit-custom w-50">Edit</a>

                            <form action="/vehicles/delete/{{ $v->id }}" method="POST" class="w-50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete-custom w-100"
                                    onclick="return confirm('Yakin ingin menghapus kendaraan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>