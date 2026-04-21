<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Metode Pembayaran</title>
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
            --success: #16a34a;
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
            box-shadow: var(--card-shadow);
            background: white;
            overflow: hidden;
        }

        .payment-header {
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #2563eb);
            color: white;
            padding: 26px 30px;
        }

        .payment-header h3 {
            margin: 0 0 8px 0;
            font-size: 2rem;
            font-weight: 800;
        }

        .payment-header p {
            margin: 0;
            color: rgba(255,255,255,0.88);
        }

        .payment-body {
            padding: 30px;
        }

        .summary-box {
            background: linear-gradient(180deg, #eff6ff, #dbeafe);
            border: 1px solid #bfdbfe;
            border-radius: 22px;
            padding: 22px;
            margin-bottom: 26px;
        }

        .summary-label {
            color: var(--muted);
            font-size: 0.95rem;
            margin-bottom: 6px;
        }

        .summary-price {
            font-size: 2.2rem;
            font-weight: 800;
            color: var(--primary-dark);
            line-height: 1.1;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 18px;
        }

        .method-option {
            display: block;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.22s ease;
            background: #fff;
            height: 100%;
        }

        .method-option:hover {
            border-color: var(--primary);
            background: #f8fbff;
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(37, 99, 235, 0.08);
        }

        .method-title {
            font-size: 1.5rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .method-desc {
            color: var(--muted);
            margin-bottom: 0;
            font-size: 1rem;
        }

        .method-badge {
            display: inline-block;
            margin-bottom: 12px;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 700;
            background: #eef2ff;
            color: #4338ca;
        }

        .btn-check:checked + .method-option {
            border-color: var(--primary);
            background: linear-gradient(180deg, #eff6ff, #f8fbff);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .btn-check:checked + .method-option .method-title {
            color: var(--primary-dark);
        }

        .action-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 28px;
        }

        .btn-custom {
            padding: 12px 22px;
            font-size: 1rem;
            font-weight: 700;
            border-radius: 14px;
        }

        .btn-confirm {
            background: linear-gradient(90deg, #16a34a, #15803d);
            color: white;
            border: none;
        }

        .btn-confirm:hover {
            background: linear-gradient(90deg, #15803d, #166534);
            color: white;
        }

        .small-note {
            color: var(--muted);
            font-size: 0.93rem;
            margin-top: 16px;
        }

        @media (max-width: 768px) {
            .payment-header {
                padding: 22px;
            }

            .payment-header h3 {
                font-size: 1.6rem;
            }

            .payment-body {
                padding: 22px;
            }

            .summary-price {
                font-size: 1.8rem;
            }

            .method-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>

<div class="container page-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card payment-card">
                <div class="payment-header">
                    <h3>Pilih Metode Pembayaran</h3>
                    <p>Pilih metode pembayaran yang paling sesuai untuk menyelesaikan transaksi booking.</p>
                </div>

                <div class="payment-body">
                    <div class="summary-box">
                        <div class="summary-label">Total Bayar</div>
                        <div class="summary-price">
                            Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                        </div>
                    </div>

                    <div class="section-title">Metode Pembayaran Tersedia</div>

                    <form action="/pay/process" method="POST">
                        @csrf
                        <input type="hidden" name="booking_id" value="{{ $booking->id }}">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="payment_type" id="bank_transfer" value="Bank Transfer" required>
                                <label class="method-option w-100" for="bank_transfer">
                                    <span class="method-badge">Rekomendasi</span>
                                    <div class="method-title">Bank Transfer</div>
                                    <p class="method-desc">Transfer melalui rekening bank untuk pembayaran yang aman dan terverifikasi.</p>
                                </label>
                            </div>

                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="payment_type" id="ewallet" value="E-Wallet" required>
                                <label class="method-option w-100" for="ewallet">
                                    <span class="method-badge">Praktis</span>
                                    <div class="method-title">E-Wallet</div>
                                    <p class="method-desc">Gunakan OVO, DANA, GoPay, atau ShopeePay untuk transaksi yang cepat.</p>
                                </label>
                            </div>

                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="payment_type" id="credit_card" value="Credit Card" required>
                                <label class="method-option w-100" for="credit_card">
                                    <span class="method-badge">Fleksibel</span>
                                    <div class="method-title">Credit Card</div>
                                    <p class="method-desc">Pembayaran dengan kartu kredit untuk kemudahan transaksi non-tunai.</p>
                                </label>
                            </div>

                            <div class="col-md-6">
                                <input type="radio" class="btn-check" name="payment_type" id="cash" value="Cash" required>
                                <label class="method-option w-100" for="cash">
                                    <span class="method-badge">Langsung</span>
                                    <div class="method-title">Cash</div>
                                    <p class="method-desc">Bayar langsung di tempat sesuai prosedur yang berlaku di lokasi rental.</p>
                                </label>
                            </div>
                        </div>

                        <div class="small-note">
                            Pastikan metode pembayaran yang dipilih sudah benar sebelum menekan tombol konfirmasi.
                        </div>

                        <div class="action-row">
                            <a href="/pay/{{ $booking->id }}" class="btn btn-outline-secondary btn-custom">Kembali</a>
                            <button type="submit" class="btn btn-confirm btn-custom">Konfirmasi Pembayaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>