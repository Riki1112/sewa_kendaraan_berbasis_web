<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
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
            --warning-bg: #fef3c7;
            --warning-text: #92400e;
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .page-wrapper {
            padding: 42px 0;
        }

        .payment-card {
            border: 1px solid var(--border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
            background: white;
        }

        .payment-header {
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #2563eb);
            color: white;
            padding: 28px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 18px;
            flex-wrap: wrap;
        }

        .payment-header h2 {
            margin: 0 0 8px 0;
            font-size: 2rem;
            font-weight: 800;
        }

        .payment-header p {
            margin: 0;
            color: rgba(255,255,255,0.88);
        }

        .status-badge {
            font-size: 0.9rem;
            font-weight: 700;
            padding: 10px 16px;
            border-radius: 999px;
            background: var(--warning-bg);
            color: var(--warning-text);
            white-space: nowrap;
        }

        .payment-body {
            padding: 30px;
            background: white;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 18px;
            color: var(--dark);
        }

        .info-box {
            background: #f8fafc;
            border-radius: 18px;
            padding: 18px 20px;
            height: 100%;
            border: 1px solid var(--border);
        }

        .info-label {
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 8px;
        }

        .info-value {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
            line-height: 1.3;
        }

        .info-value.small {
            font-size: 1.1rem;
        }

        .summary-card {
            background: linear-gradient(180deg, #eff6ff, #dbeafe);
            border: 1px solid #bfdbfe;
            border-radius: 22px;
            padding: 24px;
        }

        .summary-title {
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--primary-dark);
            margin-bottom: 18px;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 12px;
            color: var(--dark);
        }

        .summary-row:last-child {
            margin-bottom: 0;
        }

        .summary-total {
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #bfdbfe;
        }

        .summary-total .label {
            font-size: 1rem;
            color: var(--muted);
        }

        .summary-total .price {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-dark);
            line-height: 1.1;
        }

        .small-note {
            margin-top: 14px;
            color: var(--muted);
            font-size: 0.93rem;
        }

        .action-row {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 26px;
        }

        .btn-pay {
            padding: 12px 28px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 14px;
        }

        .btn-main {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
        }

        .btn-main:hover {
            color: white;
            background: linear-gradient(90deg, var(--primary-dark), #1e40af);
        }

        .btn-back {
            border-radius: 14px;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .payment-header {
                padding: 22px;
            }

            .payment-header h2 {
                font-size: 1.6rem;
            }

            .payment-body {
                padding: 22px;
            }

            .summary-total .price {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="payment-card">
                <div class="payment-header">
                    <div>
                        <h2>Halaman Pembayaran</h2>
                        <p>Silakan cek detail booking sebelum melanjutkan pembayaran.</p>
                    </div>
                    <span class="status-badge">Menunggu Pembayaran</span>
                </div>

                <div class="payment-body">
                    <div class="section-title">Ringkasan Booking</div>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">ID Booking</div>
                                <div class="info-value">#{{ $booking->id }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">ID Kendaraan</div>
                                <div class="info-value">{{ $booking->vehicle_id }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">Tanggal Mulai</div>
                                <div class="info-value small">{{ $booking->tanggal_mulai }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">Tanggal Selesai</div>
                                <div class="info-value small">{{ $booking->tanggal_selesai }}</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">Lama Sewa</div>
                                <div class="info-value">{{ $booking->lama_sewa }} Hari</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="info-box">
                                <div class="info-label">Status Booking</div>
                                <div class="info-value small text-warning text-capitalize">{{ $booking->status_booking }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="summary-card mb-4">
                        <div class="summary-title">Total Pembayaran</div>

                        <div class="summary-row">
                            <span>Durasi Sewa</span>
                            <strong>{{ $booking->lama_sewa }} Hari</strong>
                        </div>

                        <div class="summary-row">
                            <span>Status Booking</span>
                            <strong class="text-capitalize">{{ $booking->status_booking }}</strong>
                        </div>

                        <div class="summary-total text-center">
                            <div class="label mb-2">Jumlah yang harus dibayarkan</div>
                            <div class="price">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <form action="/pay/select-method" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                        <div class="small-note text-center">
                            Pastikan seluruh data booking sudah sesuai sebelum memilih metode pembayaran.
                        </div>

                        <div class="action-row">
                            <a href="/booking/4" class="btn btn-outline-secondary btn-pay btn-back">Kembali</a>
                            <button type="submit" class="btn btn-main btn-pay">Bayar Sekarang</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>