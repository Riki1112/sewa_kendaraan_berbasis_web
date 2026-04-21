<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --dark: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --card-shadow: 0 16px 38px rgba(15, 23, 42, 0.08);
        }

        body {
            background: linear-gradient(to bottom, #f8fbff, #f1f5f9);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark);
        }

        .navbar-custom {
            background: rgba(255,255,255,0.94);
            backdrop-filter: blur(10px);
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);
            padding: 14px 0;
        }

        .profile-card {
            background: white;
            border: 1px solid var(--border);
            border-radius: 28px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
        }

        .profile-header {
            background: linear-gradient(135deg, #0f172a, #1d4ed8 58%, #2563eb);
            color: white;
            padding: 30px;
        }

        .profile-body {
            padding: 28px;
        }

        .section-card {
            background: #fbfdff;
            border: 1px solid var(--border);
            border-radius: 22px;
            padding: 22px;
            margin-bottom: 22px;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 800;
            margin-bottom: 18px;
        }

        .form-label {
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-control {
            min-height: 48px;
            border-radius: 14px;
            border: 1px solid var(--border);
            padding: 12px 14px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.12);
        }

        .avatar-box {
            text-align: center;
            margin-bottom: 18px;
        }

        .avatar-box img {
            width: 96px;
            height: 96px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid rgba(255,255,255,0.4);
            background: white;
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
        }

        .btn-back {
            border-radius: 14px;
            padding: 12px 20px;
            font-weight: 700;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom px-4">
    <a class="navbar-brand fw-bold" href="/user/dashboard">Rental Kendaraan</a>
</nav>

<div class="container py-5">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="profile-card">
        <div class="profile-header">
            <div class="avatar-box">
                <img src="{{ $user->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=2563eb&color=fff' }}" alt="Avatar">
            </div>
            <h2 class="mb-1 text-center">Profil Saya</h2>
            <p class="mb-0 text-center">Kelola data akun dan informasi pribadimu.</p>
        </div>

        <div class="profile-body">
            <div class="section-card">
                <div class="section-title">Informasi Profil</div>

                <form action="/profile/update" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Nomor HP</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control" value="{{ $user->role }}" readonly>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea name="address" class="form-control" rows="4">{{ old('address', $user->address) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-2 flex-wrap">
                        <button type="submit" class="btn btn-main">Simpan Perubahan</button>
                        <a href="/user/dashboard" class="btn btn-outline-secondary btn-back">Kembali ke Dashboard</a>
                    </div>
                </form>
            </div>

            @if(!$user->google_id)
                <div class="section-card">
                    <div class="section-title">Ubah Password</div>

                    <form action="/profile/password" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">Password Lama</label>
                                <input type="password" name="current_password" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Password Baru</label>
                                <input type="password" name="new_password" class="form-control" required>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="new_password_confirmation" class="form-control" required>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-main">Update Password</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="section-card">
                    <div class="section-title">Keamanan Akun</div>
                    <p class="mb-0 text-muted">
                        Akun ini terhubung dengan Google, kelola melalui akun Google Anda.
                    </p>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>