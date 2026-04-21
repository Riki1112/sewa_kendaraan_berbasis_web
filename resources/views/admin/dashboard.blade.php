<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fb;
            font-family: Arial, sans-serif;
        }

        .navbar-custom {
            background: #111827;
        }

        .navbar-brand,
        .navbar-custom .nav-text {
            color: white !important;
        }

        .hero {
            background: linear-gradient(135deg, #111827, #2563eb);
            color: white;
            border-radius: 26px;
            padding: 38px;
            box-shadow: 0 14px 32px rgba(0,0,0,0.12);
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            right: -40px;
            top: -40px;
            width: 220px;
            height: 220px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .hero h1 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .hero p {
            font-size: 16px;
            opacity: 0.95;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }

        .mini-badge {
            display: inline-block;
            background: rgba(255,255,255,0.14);
            color: white;
            font-size: 13px;
            padding: 7px 14px;
            border-radius: 999px;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .stat-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            padding: 24px;
            height: 100%;
            transition: 0.2s;
            background: white;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            font-weight: bold;
        }

        .icon-blue {
            background: #dbeafe;
            color: #2563eb;
        }

        .icon-green {
            background: #dcfce7;
            color: #16a34a;
        }

        .icon-red {
            background: #fee2e2;
            color: #dc2626;
        }

        .stat-title {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 30px;
            font-weight: 700;
            color: #111827;
            line-height: 1;
        }

        .panel-card {
            border: none;
            border-radius: 22px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            background: white;
            padding: 28px;
        }

        .panel-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 6px;
            color: #111827;
        }

        .panel-subtitle {
            color: #6b7280;
            margin-bottom: 20px;
        }

        .btn-dashboard {
            border-radius: 12px;
            padding: 12px 18px;
            font-weight: 600;
        }

        .table-card {
            border: none;
            border-radius: 22px;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            background: white;
            overflow: hidden;
        }

        .table-header {
            padding: 22px 24px 12px;
        }

        .table-header h4 {
            margin-bottom: 4px;
            font-weight: 700;
        }

        .table-header p {
            margin-bottom: 0;
            color: #6b7280;
        }

        .table thead th {
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
            font-size: 14px;
        }

        .table td {
            vertical-align: middle;
        }

        .status-pill {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
        }

        .status-available {
            background: #dcfce7;
            color: #15803d;
        }

        .status-unavailable {
            background: #fee2e2;
            color: #b91c1c;
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
                <button class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">

    <div class="hero mb-4">
        <span class="mini-badge">Dashboard Admin Rental</span>
        <h1>Selamat Datang, Admin</h1>
        <p>Kelola kendaraan, lihat ringkasan data, dan akses fitur penting dengan cepat dari dashboard ini.</p>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">Total Kendaraan</div>
                        <div class="stat-value">{{ $totalVehicles ?? 0 }}</div>
                    </div>
                    <div class="stat-icon icon-blue">🚗</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">Kendaraan Tersedia</div>
                        <div class="stat-value">{{ $availableVehicles ?? 0 }}</div>
                    </div>
                    <div class="stat-icon icon-green">✓</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-top">
                    <div>
                        <div class="stat-title">Tidak Tersedia</div>
                        <div class="stat-value">{{ $unavailableVehicles ?? 0 }}</div>
                    </div>
                    <div class="stat-icon icon-red">!</div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel-card mb-4">
        <div class="panel-title">Quick Actions</div>
        <div class="panel-subtitle">Akses menu penting untuk manajemen kendaraan.</div>

        <div class="d-flex flex-wrap gap-2">
            <a href="/vehicles" class="btn btn-primary btn-dashboard">Kelola Kendaraan</a>
            <a href="/vehicles/create" class="btn btn-outline-primary btn-dashboard">Tambah Kendaraan</a>
        </div>
    </div>

    <div class="table-card">
        <div class="table-header">
            <h4>Kendaraan Terbaru</h4>
            <p>Ringkasan kendaraan yang baru ditambahkan atau tersedia di sistem.</p>
        </div>

        <div class="table-responsive px-3 pb-3">
            <table class="table align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nama Kendaraan</th>
                        <th>Merek</th>
                        <th>Plat Nomor</th>
                        <th>Harga Sewa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($latestVehicles ?? [] as $vehicle)
                        <tr>
                            <td>{{ $vehicle->nama_kendaraan }}</td>
                            <td>{{ $vehicle->merek }}</td>
                            <td>{{ $vehicle->plat_nomor }}</td>
                            <td>Rp {{ number_format($vehicle->harga_sewa, 0, ',', '.') }}</td>
                            <td>
                                @if(strtolower(trim($vehicle->status_ketersediaan)) == 'tersedia')
                                    <span class="status-pill status-available">Tersedia</span>
                                @else
                                    <span class="status-pill status-unavailable">Tidak Tersedia</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada data kendaraan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
