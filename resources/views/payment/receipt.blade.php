<!DOCTYPE html>
<html>
<head>
    <title>Resi Pembayaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @page {
            size: A4;
            margin: 8mm;
        }

        body {
            background: #eef2f7;
            font-family: Arial, sans-serif;
        }

        .invoice-wrapper {
            max-width: 900px;
            margin: 20px auto;
        }

        .invoice-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.10);
            background: white;
        }

        .invoice-header {
            background: linear-gradient(135deg, #198754, #157347);
            color: white;
            padding: 22px 24px;
        }

        .invoice-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .invoice-header p {
            margin: 4px 0 0;
            opacity: 0.95;
            font-size: 14px;
        }

        .success-badge {
            background: #d1e7dd;
            color: #0f5132;
            padding: 8px 14px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 13px;
            display: inline-block;
        }

        .invoice-body {
            padding: 22px;
        }

        .invoice-top-box {
            background: #f8f9fa;
            border: 1px solid #e9ecef;
            border-radius: 14px;
            padding: 14px 16px;
            margin-bottom: 16px;
        }

        .invoice-label {
            font-size: 12px;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .invoice-value {
            font-size: 17px;
            font-weight: 700;
            color: #212529;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
            color: #212529;
        }

        .detail-box {
            background: #fff;
            border: 1px solid #ececec;
            border-radius: 14px;
            padding: 12px 14px;
            height: 100%;
        }

        .detail-row {
            padding: 7px 0;
            border-bottom: 1px dashed #e5e5e5;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-key {
            color: #6c757d;
            font-size: 12px;
            margin-bottom: 1px;
        }

        .detail-val {
            font-weight: 700;
            font-size: 14px;
            color: #212529;
            line-height: 1.3;
        }

        .payment-method {
            display: inline-block;
            background: #e7f1ff;
            color: #0d6efd;
            padding: 5px 11px;
            border-radius: 999px;
            font-weight: 700;
            font-size: 12px;
        }

        .total-box {
            margin-top: 16px;
            background: linear-gradient(135deg, #0d6efd, #0a58ca);
            color: white;
            border-radius: 14px;
            padding: 18px;
            text-align: center;
        }

        .total-box .label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 4px;
        }

        .total-box .amount {
            font-size: 30px;
            font-weight: 800;
            line-height: 1.2;
        }

        .signature-box {
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid #eee;
        }

        .footer-note {
            margin-top: 12px;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
        }

        .btn-custom {
            padding: 10px 18px;
            border-radius: 10px;
            font-weight: 600;
        }

        @media print {
            html, body {
                width: 210mm;
                height: 297mm;
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .invoice-wrapper {
                max-width: 100% !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .container,
            .row,
            .col-lg-9,
            .col-md-6 {
                width: 100% !important;
                max-width: 100% !important;
                margin: 0 !important;
                padding-left: 0 !important;
                padding-right: 0 !important;
            }

            .invoice-card {
                box-shadow: none !important;
                border-radius: 0 !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
            }

            .invoice-body {
                padding: 14px !important;
            }

            .invoice-header {
                padding: 16px 18px !important;
            }

            .invoice-header h1 {
                font-size: 24px !important;
            }

            .invoice-header p {
                font-size: 12px !important;
            }

            .invoice-top-box {
                padding: 10px 12px !important;
                margin-bottom: 10px !important;
            }

            .section-title {
                font-size: 14px !important;
                margin-bottom: 8px !important;
            }

            .detail-box {
                padding: 10px 12px !important;
            }

            .detail-row {
                padding: 5px 0 !important;
            }

            .detail-key {
                font-size: 11px !important;
            }

            .detail-val {
                font-size: 13px !important;
            }

            .invoice-value {
                font-size: 14px !important;
            }

            .payment-method {
                font-size: 11px !important;
                padding: 4px 9px !important;
            }

            .total-box {
                margin-top: 10px !important;
                padding: 12px !important;
            }

            .total-box .label {
                font-size: 12px !important;
                margin-bottom: 2px !important;
            }

            .total-box .amount {
                font-size: 24px !important;
            }

            .signature-box {
                margin-top: 10px !important;
                padding-top: 10px !important;
            }

            .footer-note {
                margin-top: 8px !important;
                font-size: 11px !important;
            }

            .g-4 {
                --bs-gutter-x: 0.75rem !important;
                --bs-gutter-y: 0.75rem !important;
            }

            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<div class="container invoice-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card invoice-card">

                <div class="invoice-header d-flex justify-content-between align-items-start flex-wrap gap-3">
                    <div>
                        <h1>Resi Pembayaran</h1>
                        <p>Bukti pembayaran resmi transaksi rental kendaraan</p>
                    </div>
                    <div class="success-badge">Pembayaran Berhasil</div>
                </div>

                <div class="invoice-body">

                    <div class="invoice-top-box">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="invoice-label">Invoice / Order ID</div>
                                <div class="invoice-value">{{ $payment->order_id }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="invoice-label">ID Payment</div>
                                <div class="invoice-value">#{{ $payment->id }}</div>
                            </div>
                            <div class="col-md-4">
                                <div class="invoice-label">Waktu Pembayaran</div>
                                <div class="invoice-value">{{ $payment->transaction_time }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="section-title">Detail Booking</div>
                            <div class="detail-box">
                                <div class="detail-row">
                                    <div class="detail-key">ID Booking</div>
                                    <div class="detail-val">#{{ $booking->id }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">ID Kendaraan</div>
                                    <div class="detail-val">{{ $booking->vehicle_id }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Tanggal Mulai</div>
                                    <div class="detail-val">{{ $booking->tanggal_mulai }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Tanggal Selesai</div>
                                    <div class="detail-val">{{ $booking->tanggal_selesai }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Lama Sewa</div>
                                    <div class="detail-val">{{ $booking->lama_sewa }} hari</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="section-title">Detail Pembayaran</div>
                            <div class="detail-box">
                                <div class="detail-row">
                                    <div class="detail-key">Metode Pembayaran</div>
                                    <div class="detail-val">
                                        <span class="payment-method">{{ $payment->payment_type }}</span>
                                    </div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Status Pembayaran</div>
                                    <div class="detail-val text-success">{{ ucfirst($payment->transaction_status) }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Tanggal Transaksi</div>
                                    <div class="detail-val">{{ $payment->transaction_time }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Settlement Time</div>
                                    <div class="detail-val">{{ $payment->settlement_time }}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-key">Catatan</div>
                                    <div class="detail-val">Transaksi telah berhasil diproses dan diterima sistem.</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="total-box">
                        <div class="label">Total Pembayaran</div>
                        <div class="amount">Rp {{ number_format($payment->gross_amount, 0, ',', '.') }}</div>
                    </div>

                    <div class="signature-box row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Penyedia Rental</strong></p>
                            <p class="text-muted mb-0">Admin Rental Kendaraan kelas I243C</p>
                        </div>
                        <div class="col-md-6 text-md-end mt-3 mt-md-0">
                            <p class="mb-1"><strong>Status Dokumen</strong></p>
                            <p class="text-success mb-0">Valid / Lunas</p>
                        </div>
                    </div>

                    <div class="footer-note">
                        Simpan resi ini sebagai bukti pembayaran yang sah.
                    </div>

                    <div class="mt-4 d-flex gap-2 justify-content-center no-print">
                        <a href="/user/dashboard" class="btn btn-primary btn-custom">Kembali ke Daftar Kendaraan</a>
                        <button onclick="window.print()" class="btn btn-success btn-custom">Cetak Resi</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
