<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-soft: #f1f5f9;
            --border-soft: #e2e8f0;
            --success-bg: #dcfce7;
            --success-text: #166534;
            --danger-bg: #fee2e2;
            --danger-text: #991b1b;
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text-dark);
        }

        .navbar-custom {
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 24px rgba(15, 23, 42, 0.06);
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .navbar-brand {
            font-size: 1.6rem;
            font-weight: 800;
            color: var(--text-dark) !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand span {
            color: var(--primary);
        }

        .user-greeting {
            font-weight: 500;
            color: var(--text-muted);
        }

        .user-greeting strong {
            color: var(--text-dark);
        }

        .btn-logout {
            border-radius: 12px;
            padding: 8px 16px;
            font-weight: 600;
        }

        .hero {
            background: linear-gradient(135deg, #1d4ed8, #2563eb 55%, #0f172a);
            color: white;
            border-radius: 28px;
            padding: 40px;
            margin-bottom: 28px;
            box-shadow: 0 18px 45px rgba(37, 99, 235, 0.20);
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            right: -60px;
            top: -60px;
            width: 220px;
            height: 220px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .hero h2 {
            font-size: 2.2rem;
            font-weight: 800;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 1.05rem;
            color: rgba(255,255,255,0.88);
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }

        .stats-row {
            margin-bottom: 28px;
        }

        .stats-card {
            background: white;
            border: 1px solid var(--border-soft);
            border-radius: 22px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.05);
            height: 100%;
        }

        .stats-label {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 8px;
        }

        .stats-value {
            font-size: 1.9rem;
            font-weight: 800;
            color: var(--text-dark);
            line-height: 1;
        }

        .section-title {
            font-size: 1.8rem;
            font-weight: 800;
            margin-bottom: 6px;
        }

        .section-subtitle {
            color: var(--text-muted);
            margin-bottom: 0;
        }

        .vehicle-card {
            border: 1px solid #eef2f7;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            transition: all 0.25s ease;
            height: 100%;
            background: white;
        }

        .vehicle-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 36px rgba(15, 23, 42, 0.10);
        }

        .vehicle-image-wrap {
            background: linear-gradient(180deg, #f8fafc, #eef4fb);
            padding: 18px;
            height: 245px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .vehicle-card img {
            max-width: 100%;
            max-height: 200px;
            object-fit: contain;
            width: auto;
            border-radius: 14px;
        }

        .card-body {
            padding: 24px;
        }

        .vehicle-brand {
            color: var(--text-muted);
            font-size: 0.95rem;
            margin-bottom: 6px;
        }

        .vehicle-title {
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1.15;
            margin-bottom: 10px;
            color: var(--text-dark);
        }

        .vehicle-price {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--primary);
            margin-bottom: 16px;
        }

        .price-unit {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-muted);
        }

        .status-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 18px;
        }

        .status-available {
            background: var(--success-bg);
            color: var(--success-text);
        }

        .status-unavailable {
            background: var(--danger-bg);
            color: var(--danger-text);
        }

        .btn-detail-custom {
            background: #e0f2fe;
            color: #0369a1;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
        }

        .btn-detail-custom:hover {
            background: #bae6fd;
            color: #075985;
        }

        .btn-booking-custom {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
        }

        .btn-booking-custom:hover {
            background: linear-gradient(90deg, var(--primary-dark), #1e40af);
            color: white;
        }

        .btn-disabled-custom {
            background: #cbd5e1;
            color: #475569;
            border: none;
            border-radius: 14px;
            padding: 12px;
            font-weight: 700;
        }

        .vehicle-footer-space {
            margin-top: 4px;
        }

        @media (max-width: 768px) {
            .hero {
                padding: 28px 24px;
                border-radius: 22px;
            }

            .hero h2 {
                font-size: 1.7rem;
            }

            .vehicle-title {
                font-size: 1.5rem;
            }

            .navbar-brand {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom px-4">
    <a class="navbar-brand fw-bold" href="#">Rental <span>Kendaraan</span></a>
            <div class="ms-auto d-flex align-items-center gap-3">
            <span class="user-greeting">Halo, <strong>{{ auth()->user()->name }}</strong></span>

            <a href="/profile" class="btn btn-outline-primary btn-sm btn-logout">Profil</a>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-outline-danger btn-sm btn-logout">Logout</button>
            </form>
        </div>
</nav>

<div class="container py-4">
    <div class="hero">
        <h2>Pilih Kendaraan Favoritmu</h2>
        <p>Booking kendaraan dengan cepat, aman, dan nyaman untuk setiap kebutuhan perjalananmu.</p>
    </div>

    <div class="row g-4 stats-row">
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-label">Total Kendaraan</div>
                <div class="stats-value">{{ $vehicles->count() }}</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-label">Kendaraan Tersedia</div>
                <div class="stats-value">
                    {{ $vehicles->filter(fn($item) => strtolower(trim($item->status_ketersediaan)) == 'tersedia')->count() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stats-card">
                <div class="stats-label">Tidak Tersedia</div>
                <div class="stats-value">
                    {{ $vehicles->filter(fn($item) => strtolower(trim($item->status_ketersediaan)) != 'tersedia')->count() }}
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <h3 class="section-title">Daftar Kendaraan</h3>
        <p class="section-subtitle">Temukan kendaraan terbaik sesuai kebutuhan perjalananmu.</p>
    </div>

    <div class="row g-4">
        @foreach($vehicles as $v)
        <div class="col-md-6 col-lg-4">
            <div class="card vehicle-card">

                <div class="vehicle-image-wrap">
@if($v->images->count() > 0)
    @php
        $mainImage = $v->images->where('is_primary', 1)->first() ?? $v->images->first();
    @endphp

    <img src="{{ asset('storage/' . $mainImage->image) }}" alt="{{ $v->nama_kendaraan }}">
@elseif($v->gambar)
    <img src="{{ asset('images/' . $v->gambar) }}" alt="{{ $v->nama_kendaraan }}">
@else
    <img src="https://via.placeholder.com/400x220?text=No+Image" alt="No Image">
@endif
                </div>

                <div class="card-body">
                    <div class="vehicle-brand">{{ $v->merek }}</div>
                    <h4 class="vehicle-title">{{ $v->nama_kendaraan }}</h4>

                    <p class="vehicle-price">
                        Rp {{ number_format($v->harga_sewa, 0, ',', '.') }}
                        <span class="price-unit">/ hari</span>
                    </p>

                    @if(strtolower(trim($v->status_ketersediaan)) == 'tersedia')
                        <span class="status-badge status-available">Tersedia</span>
                    @else
                        <span class="status-badge status-unavailable">Tidak Tersedia</span>
                    @endif

                    <div class="d-grid gap-2 vehicle-footer-space">
                        <a href="/user/vehicles/detail/{{ $v->id }}" class="btn btn-detail-custom">Detail</a>

                        @if(strtolower(trim($v->status_ketersediaan)) == 'tersedia')
                            <a href="/booking/{{ $v->id }}" class="btn btn-booking-custom">Booking</a>
                        @else
                            <button class="btn btn-disabled-custom" disabled>Tidak Bisa Dibooking</button>
                        @endif
                    </div>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>