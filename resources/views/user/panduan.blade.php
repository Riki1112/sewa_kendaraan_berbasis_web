<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panduan Penggunaan Aplikasi Rental Kendaraan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f7fb;
            font-family:'Segoe UI',sans-serif;
        }

        .hero{
            background:linear-gradient(135deg,#2563eb,#1e3a8a);
            color:white;
            padding:50px;
            border-radius:20px;
            margin-bottom:40px;
            box-shadow:0 10px 30px rgba(0,0,0,.15);
        }

        .hero h1{
            font-size:48px;
            font-weight:700;
        }

        .hero p{
            opacity:.9;
            font-size:18px;
        }

        .card-custom{
            background:white;
            border:none;
            border-radius:15px;
            box-shadow:0 5px 20px rgba(0,0,0,.08);
            margin-bottom:25px;
            overflow:hidden;
        }

        .card-custom .card-header{
            background:#2563eb;
            color:white;
            font-weight:600;
            padding:15px 20px;
        }

        .card-custom .card-body{
            padding:25px;
        }

        .toc li{
            margin-bottom:8px;
        }

        .toc a{
            text-decoration:none;
            color:#2563eb;
            font-weight:500;
        }

        .toc a:hover{
            color:#1e3a8a;
        }

        .chapter-title{
            display:flex;
            align-items:center;
            gap:15px;
            margin-bottom:20px;
        }

        .chapter-number{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#2563eb;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:bold;
        }

        .alert{
            border-radius:12px;
        }

        table{
            border-radius:10px;
            overflow:hidden;
        }

        .btn-back{
            background:#2563eb;
            color:white;
            border:none;
            border-radius:10px;
            padding:12px 25px;
            font-weight:600;
        }

        .btn-back:hover{
            background:#1e40af;
            color:white;
        }

        .info-box{
            background:#eef4ff;
            border-left:5px solid #2563eb;
            padding:15px;
            border-radius:10px;
            margin-top:15px;
        }

        .faq-item{
            margin-bottom:20px;
        }

        .faq-item strong{
            color:#2563eb;
        }

        @media(max-width:768px){

            .hero{
                padding:30px;
            }

            .hero h1{
                font-size:32px;
            }

        }

    </style>

</head>
<body>

<div class="container py-5">

    <button class="btn btn-secondary btn-lg mb-4" onclick="window.print()">
    🖨️ Print Panduan
</button>

    <div class="hero text-center">

        <h1>📖 Buku Panduan Pengguna</h1>

        <h3>Sistem Rental Kendaraan Berbasis Web</h3>

        <p>
            Panduan lengkap penggunaan aplikasi rental kendaraan mulai dari login,
            melihat kendaraan, melakukan booking hingga pengelolaan akun pengguna.
        </p>

        <span class="badge bg-light text-dark fs-6">
            Versi 1.0
        </span>
            

    </div>

    <!-- DAFTAR ISI -->

    <div class="card-custom">

        <div class="card-header">
            Daftar Isi
        </div>

        <div class="card-body">

            <ol class="toc">
                <li><a href="#pendahuluan">Pendahuluan</a></li>
                <li><a href="#tujuan">Tujuan Sistem</a></li>
                <li><a href="#login">Cara Login</a></li>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#kendaraan">Daftar Kendaraan</a></li>
                <li><a href="#detail">Detail Kendaraan</a></li>
                <li><a href="#booking">Booking Kendaraan</a></li>
                <li><a href="#riwayat">Riwayat Booking</a></li>
                <li><a href="#profil">Profil Pengguna</a></li>
                <li><a href="#logout">Logout</a></li>
                <li><a href="#troubleshooting">Troubleshooting</a></li>
                <li><a href="#faq">FAQ</a></li>
            </ol>

        </div>

    </div>

    <!-- PENDAHULUAN -->

    <div class="card-custom" id="pendahuluan">

        <div class="card-header">1. Pendahuluan</div>

        <div class="card-body">

            <p>
                Sistem Rental Kendaraan Berbasis Web merupakan aplikasi yang digunakan
                untuk mempermudah proses penyewaan kendaraan secara online.
            </p>

            <p>
                Pengguna dapat melihat kendaraan yang tersedia, melakukan booking,
                memantau riwayat transaksi dan mengelola akun secara mandiri.
            </p>

        </div>

    </div>

    <!-- TUJUAN -->

    <div class="card-custom" id="tujuan">

        <div class="card-header">2. Tujuan Sistem</div>

        <div class="card-body">

            <ul>
                <li>Mempermudah proses penyewaan kendaraan.</li>
                <li>Mempercepat proses booking.</li>
                <li>Menyediakan informasi kendaraan secara real-time.</li>
                <li>Mengelola data penyewaan secara terpusat.</li>
                <li>Meningkatkan efisiensi pelayanan pelanggan.</li>
            </ul>

        </div>

    </div>

    <!-- LOGIN -->

    <div class="card-custom" id="login">

        <div class="card-header">3. Cara Login</div>

        <div class="card-body">

            <ol>
                <li>Buka halaman login.</li>
                <li>Masukkan email yang terdaftar.</li>
                <li>Masukkan password akun.</li>
                <li>Klik tombol Login.</li>
                <li>Jika berhasil pengguna diarahkan ke Dashboard.</li>
            </ol>

            <div class="alert alert-info">
                Pastikan email dan password yang dimasukkan sudah benar.
            </div>

        </div>

    </div>

    <!-- DASHBOARD -->

    <div class="card-custom" id="dashboard">

        <div class="card-header">4. Dashboard</div>

        <div class="card-body">

            <p>Dashboard adalah halaman utama setelah login.</p>

            <ul>
                <li>Total Kendaraan</li>
                <li>Kendaraan Tersedia</li>
                <li>Kendaraan Tidak Tersedia</li>
                <li>Daftar Kendaraan</li>
                <li>Menu Profil</li>
                <li>Menu Panduan</li>
                <li>Menu Logout</li>
            </ul>

        </div>

    </div>

    <!-- DAFTAR KENDARAAN -->

    <div class="card-custom" id="kendaraan">

        <div class="card-header">5. Daftar Kendaraan</div>

        <div class="card-body">

            <p>
                Menu ini menampilkan seluruh kendaraan yang tersedia untuk disewa.
            </p>

            <ul>
                <li>Foto Kendaraan</li>
                <li>Nama Kendaraan</li>
                <li>Harga Sewa per Hari</li>
                <li>Status Ketersediaan</li>
            </ul>

        </div>

    </div>

    <!-- DETAIL -->

    <div class="card-custom" id="detail">

        <div class="card-header">6. Detail Kendaraan</div>

        <div class="card-body">

            <ul>
                <li>Nama Kendaraan</li>
                <li>Merk Kendaraan</li>
                <li>Tahun Kendaraan</li>
                <li>Harga Sewa</li>
                <li>Status Kendaraan</li>
                <li>Foto Kendaraan</li>
            </ul>

        </div>

    </div>

    <!-- BOOKING -->

    <div class="card-custom" id="booking">

        <div class="card-header">7. Booking Kendaraan</div>

        <div class="card-body">

            <ol>
                <li>Pilih kendaraan.</li>
                <li>Klik tombol Booking.</li>
                <li>Isi tanggal mulai sewa.</li>
                <li>Isi tanggal selesai sewa.</li>
                <li>Periksa data booking.</li>
                <li>Klik Simpan Booking.</li>
            </ol>

            <div class="alert alert-success">
                Booking yang berhasil akan tersimpan secara otomatis ke database sistem.
            </div>

        </div>

    </div>

    <!-- RIWAYAT -->

    <div class="card-custom" id="riwayat">

        <div class="card-header">8. Riwayat Booking</div>

        <div class="card-body">

            <ul>
                <li>Tanggal Booking</li>
                <li>Nama Kendaraan</li>
                <li>Durasi Sewa</li>
                <li>Total Biaya</li>
                <li>Status Booking</li>
            </ul>

        </div>

    </div>

    <!-- PROFIL -->

    <div class="card-custom" id="profil">

        <div class="card-header">9. Profil Pengguna</div>

        <div class="card-body">

            <ul>
                <li>Mengubah Nama Pengguna.</li>
                <li>Mengubah Email.</li>
                <li>Mengubah Password.</li>
                <li>Melihat Informasi Akun.</li>
            </ul>

        </div>

    </div>

    <!-- LOGOUT -->

    <div class="card-custom" id="logout">

        <div class="card-header">10. Logout</div>

        <div class="card-body">

            <ol>
                <li>Klik tombol Logout.</li>
                <li>Sistem akan menghapus sesi login.</li>
                <li>Pengguna diarahkan ke halaman login.</li>
            </ol>

        </div>

    </div>

    <!-- TROUBLESHOOTING -->

    <div class="card-custom" id="troubleshooting">

        <div class="card-header">11. Troubleshooting</div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead class="table-primary">
                    <tr>
                        <th>Masalah</th>
                        <th>Solusi</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Tidak Bisa Login</td>
                        <td>Periksa email dan password.</td>
                    </tr>

                    <tr>
                        <td>Booking Gagal</td>
                        <td>Pastikan kendaraan masih tersedia.</td>
                    </tr>

                    <tr>
                        <td>Data Tidak Muncul</td>
                        <td>Refresh halaman atau hubungi admin.</td>
                    </tr>
                </tbody>

            </table>

        </div>

    </div>

    <!-- FAQ -->

    <div class="card-custom" id="faq">

        <div class="card-header">12. Frequently Asked Questions (FAQ)</div>

        <div class="card-body">

            <div class="faq-item">
                <strong>Q:</strong> Apakah saya bisa membatalkan booking?<br>
                <strong>A:</strong> Ya, selama kendaraan belum digunakan.
            </div>

            <div class="faq-item">
                <strong>Q:</strong> Apakah data booking tersimpan otomatis?<br>
                <strong>A:</strong> Ya, seluruh transaksi tersimpan ke database.
            </div>

            <div class="faq-item">
                <strong>Q:</strong> Bagaimana jika lupa password?<br>
                <strong>A:</strong> Hubungi administrator sistem.
            </div>

        </div>

    </div>

    <a href="/user/dashboard" class="btn btn-back">
        ← Kembali ke Dashboard
    </a>

</div>

</body>
</html>