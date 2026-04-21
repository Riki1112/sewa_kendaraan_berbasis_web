<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --success: #16a34a;
            --success-dark: #15803d;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        body {
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            background:
                linear-gradient(135deg, rgba(15, 23, 42, 0.88), rgba(22, 163, 74, 0.78)),
                linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-wrapper {
            width: 100%;
            padding: 28px 0;
        }

        .auth-card {
            border: 1px solid rgba(255,255,255,0.15);
            border-radius: 28px;
            box-shadow: 0 24px 60px rgba(0,0,0,0.20);
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(12px);
            overflow: hidden;
        }

        .auth-side {
            background: linear-gradient(160deg, #0f172a, #1d4ed8 58%, #16a34a);
            color: white;
            height: 100%;
            padding: 36px 30px;
            position: relative;
            overflow: hidden;
        }

        .auth-side::before {
            content: "";
            position: absolute;
            top: -40px;
            right: -40px;
            width: 180px;
            height: 180px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
        }

        .auth-side::after {
            content: "";
            position: absolute;
            bottom: -60px;
            left: -30px;
            width: 170px;
            height: 170px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }

        .brand-badge {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255,255,255,0.12);
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }

        .auth-side h2 {
            font-size: 2.3rem;
            font-weight: 800;
            margin-bottom: 12px;
            position: relative;
            z-index: 1;
        }

        .auth-side p {
            color: rgba(255,255,255,0.86);
            line-height: 1.7;
            margin-bottom: 0;
            position: relative;
            z-index: 1;
        }

        .auth-form {
            padding: 38px 34px;
        }

        .form-title {
            font-size: 2.1rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-subtitle {
            color: var(--muted);
            margin-bottom: 24px;
        }

        .form-label {
            font-weight: 700;
            color: var(--dark);
            margin-bottom: 8px;
        }

        .form-control {
            min-height: 50px;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 12px 14px;
            font-size: 0.98rem;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.12);
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: var(--muted);
            font-size: 1.1rem;
            padding: 0;
            line-height: 1;
        }

        .toggle-password:hover {
            color: var(--primary-dark);
        }

        .btn-register {
            width: 100%;
            background: linear-gradient(90deg, var(--success), var(--success-dark));
            border: none;
            color: white;
            border-radius: 14px;
            min-height: 52px;
            font-weight: 700;
            font-size: 1rem;
            margin-top: 8px;
        }

        .btn-register:hover {
            background: linear-gradient(90deg, var(--success-dark), #166534);
            color: white;
        }

        .bottom-text {
            text-align: center;
            margin-top: 20px;
            color: var(--muted);
        }

        .bottom-text a {
            color: var(--primary);
            font-weight: 700;
            text-decoration: none;
        }

        .bottom-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            .auth-side {
                display: none;
            }

            .auth-form {
                padding: 30px 24px;
            }

            .form-title {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
<div class="container register-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-10 col-xl-9">
            <div class="card auth-card">
                <div class="row g-0">
                    <div class="col-lg-5">
                        <div class="auth-side">
                            <div class="brand-badge">Rental Kendaraan</div>
                            <h2>Buat Akun Baru</h2>
                            <p>
                                Daftar untuk mulai booking kendaraan dengan proses yang cepat,
                                aman, dan lebih nyaman sesuai kebutuhan perjalananmu.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-7">
                        <div class="auth-form">
                            <h2 class="form-title">Register</h2>
                            <p class="form-subtitle">Lengkapi data berikut untuk membuat akun baru.</p>

                            <form method="POST" action="/register">
                                @csrf

                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                    <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="password" id="password" class="form-control pe-5" required>
                                        <button type="button" class="toggle-password" onclick="togglePassword('password', this)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Konfirmasi Password</label>
                                    <div class="password-wrapper">
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control pe-5" required>
                                        <button type="button" class="toggle-password" onclick="togglePassword('password_confirmation', this)">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>
                                <button class="btn btn-register">Register</button>
                            </form>

                            <p class="bottom-text mb-0">
                                Sudah punya akun? <a href="/login">Login</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const icon = button.querySelector('i');

        if (input.type === 'password') {
            input.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            input.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
</body>
</html>