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
            margin-bottom: 24px;
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
            white-space: nowrap;
        }

        .table td {
            vertical-align: middle;
            white-space: nowrap;
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

        .status-pending {
            background: #fef3c7;
            color: #92400e;
        }

        .booking-modal .modal-content {
    border: none;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 30px 80px rgba(0,0,0,0.25);
    }

        .booking-modal .modal-header {
            background: linear-gradient(135deg, #111827, #2563eb);
            color: white;
            padding: 24px 28px;
            border-bottom: none;
        }

        .booking-modal .modal-title {
            font-weight: 800;
            font-size: 24px;
        }

        .booking-modal .btn-close {
            filter: invert(1);
            opacity: 1;
        }

        .detail-section {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 18px;
            padding: 20px;
            height: 100%;
        }

        .detail-section h6 {
            font-size: 16px;
            font-weight: 800;
            color: #111827;
            margin-bottom: 16px;
        }

        .detail-item {
            margin-bottom: 14px;
        }

        .detail-label {
            color: #6b7280;
            font-size: 13px;
            margin-bottom: 3px;
        }

        .detail-value {
            color: #111827;
            font-size: 16px;
            font-weight: 600;
        }

        .price-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 18px;
            padding: 18px;
        }

        .price-box .detail-value {
            color: #1d4ed8;
            font-size: 22px;
            font-weight: 800;
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

{{-- BAGIAN TAMBAHAN: DAFTAR BOOKING --}}
<div class="table-card">
    <div class="table-header">
        <h4>Daftar Booking</h4>
        <p>Klik tombol detail untuk melihat informasi booking secara lengkap.</p>
    </div>

    <div class="table-responsive px-3 pb-3">
        <table class="table align-middle mb-0">
            <thead>
                <tr>
                    <th width="120">Aksi</th>
                    <th>Nama Penyewa</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Sewa</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($bookings ?? [] as $booking)
                    <tr>
                        <td>
                            <button type="button"
                                    class="btn btn-primary btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailBooking{{ $booking->id }}">
                                Detail
                            </button>
                        </td>

                        <td>
                            <strong>{{ $booking->nama_penyewa ?? $booking->user->name ?? '-' }}</strong><br>
                            <small class="text-muted">
                                {{ $booking->email_penyewa ?? $booking->user->email ?? '-' }}
                            </small>
                        </td>

                        <td>
                            <strong>{{ $booking->vehicle->nama_kendaraan ?? '-' }}</strong><br>
                            <small class="text-muted">
                                {{ $booking->vehicle->merek ?? '-' }} - {{ $booking->vehicle->plat_nomor ?? '-' }}
                            </small>
                        </td>

                        <td>
                            {{ $booking->tanggal_mulai ? \Carbon\Carbon::parse($booking->tanggal_mulai)->format('d-m-Y') : '-' }}
                            s/d
                            {{ $booking->tanggal_selesai ? \Carbon\Carbon::parse($booking->tanggal_selesai)->format('d-m-Y') : '-' }}
                            <br>
                            <small class="text-muted">{{ $booking->lama_sewa ?? '-' }} Hari</small>
                        </td>

                        <td>
                            <strong>Rp {{ number_format($booking->total_harga ?? 0, 0, ',', '.') }}</strong>
                        </td>

                        <td>
                            @php
                                $statusBooking = strtolower(trim($booking->status_booking ?? ''));
                            @endphp

                            @if($statusBooking == 'pending')
                                <span class="status-pill status-pending">Pending</span>
                            @elseif($statusBooking == 'confirmed' || $statusBooking == 'selesai' || $statusBooking == 'success')
                                <span class="status-pill status-available">{{ ucfirst($booking->status_booking) }}</span>
                            @else
                                <span class="status-pill status-unavailable">
                                    {{ $booking->status_booking ?? '-' }}
                                </span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada data booking.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


{{-- MODAL DETAIL BOOKING - DITARUH DI LUAR TABLE --}}
@foreach($bookings ?? [] as $booking)
    <div class="modal fade booking-modal" id="detailBooking{{ $booking->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <div class="modal-header">
                    <div>
                        <h5 class="modal-title">Detail Booking</h5>
                        <small>ID Booking: #{{ $booking->id }}</small>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-4">

                        {{-- DATA PENYEWA --}}
                        <div class="col-md-6">
                            <div class="detail-section">
                                <h6>Data Penyewa</h6>

                                <div class="detail-item">
                                    <div class="detail-label">Nama</div>
                                    <div class="detail-value">
                                        {{ $booking->nama_penyewa ?? $booking->user->name ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Email</div>
                                    <div class="detail-value">
                                        {{ $booking->email_penyewa ?? $booking->user->email ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Nomor HP</div>
                                    <div class="detail-value">
                                        {{ $booking->nomor_hp ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Alamat</div>
                                    <div class="detail-value">
                                        {{ $booking->alamat ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Alamat Lengkap / Catatan</div>
                                    <div class="detail-value">
                                        {{ $booking->alamat_lengkap ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">User ID</div>
                                    <div class="detail-value">
                                        {{ $booking->user_id ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DATA KENDARAAN --}}
                        <div class="col-md-6">
                            <div class="detail-section">
                                <h6>Data Kendaraan</h6>

                                <div class="detail-item">
                                    <div class="detail-label">Nama Kendaraan</div>
                                    <div class="detail-value">
                                        {{ $booking->vehicle->nama_kendaraan ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Merek</div>
                                    <div class="detail-value">
                                        {{ $booking->vehicle->merek ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Plat Nomor</div>
                                    <div class="detail-value">
                                        {{ $booking->vehicle->plat_nomor ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Tahun</div>
                                    <div class="detail-value">
                                        {{ $booking->vehicle->tahun ?? '-' }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Harga Sewa / Hari</div>
                                    <div class="detail-value">
                                        Rp {{ number_format($booking->vehicle->harga_sewa ?? 0, 0, ',', '.') }}
                                    </div>
                                </div>

                                <div class="detail-item">
                                    <div class="detail-label">Status Kendaraan</div>
                                    <div class="detail-value">
                                        {{ $booking->vehicle->status_ketersediaan ?? '-' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DATA BOOKING --}}
                        <div class="col-md-12">
                            <div class="detail-section">
                                <h6>Data Booking</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Tanggal Mulai</div>
                                            <div class="detail-value">
                                                {{ $booking->tanggal_mulai ? \Carbon\Carbon::parse($booking->tanggal_mulai)->format('d-m-Y') : '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Tanggal Selesai</div>
                                            <div class="detail-value">
                                                {{ $booking->tanggal_selesai ? \Carbon\Carbon::parse($booking->tanggal_selesai)->format('d-m-Y') : '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Lama Sewa</div>
                                            <div class="detail-value">
                                                {{ $booking->lama_sewa ?? '-' }} Hari
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item price-box">
                                            <div class="detail-label">Total Harga</div>
                                            <div class="detail-value">
                                                Rp {{ number_format($booking->total_harga ?? 0, 0, ',', '.') }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Status Booking</div>
                                            <div class="detail-value">
                                                {{ $booking->status_booking ?? '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Status Data</div>
                                            <div class="detail-value">
                                                {{ $booking->status ?? '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DATA SISTEM --}}
                        <div class="col-md-12">
                            <div class="detail-section bg-light">
                                <h6>Data Sistem</h6>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Company Code</div>
                                            <div class="detail-value">
                                                {{ $booking->companyCode ?? '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Is Deleted</div>
                                            <div class="detail-value">
                                                {{ $booking->isDeleted ?? '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Dibuat Oleh</div>
                                            <div class="detail-value">
                                                {{ $booking->createdBy ?? '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Tanggal Dibuat</div>
                                            <div class="detail-value">
                                                {{ $booking->createdDate ? \Carbon\Carbon::parse($booking->createdDate)->format('d-m-Y H:i') : '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Update Terakhir Oleh</div>
                                            <div class="detail-value">
                                                {{ $booking->lastUpdateBy ?? '-' }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="detail-item">
                                            <div class="detail-label">Tanggal Update Terakhir</div>
                                            <div class="detail-value">
                                                {{ $booking->lastUpdateDate ? \Carbon\Carbon::parse($booking->lastUpdateDate)->format('d-m-Y H:i') : '-' }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>

            </div>
        </div>
    </div>
@endforeach

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>