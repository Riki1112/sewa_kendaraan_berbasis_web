<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Vehicle Reports
    </title>

    <!-- BOOTSTRAP -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- GOOGLE FONT -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >

    <style>

        body{
            background:#f4f7fb;
            font-family:'Poppins',sans-serif;
        }

        .report-container{
            padding:40px;
        }

        .report-title{
            font-size:32px;
            font-weight:700;
            color:#111827;
        }

        .card-custom{
            border:none;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .stat-card{
            padding:25px;
        }

        .stat-title{
            font-size:15px;
            color:#6b7280;
        }

        .stat-value{
            font-size:32px;
            font-weight:700;
            margin-top:10px;
        }

        .table{
            margin-top:20px;
        }

        .table thead{
            background:#111827;
            color:white;
        }

        .badge-success{
            background:#22c55e;
        }

        .badge-warning{
            background:#f59e0b;
        }

        .top-bar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:30px;
        }

    </style>

</head>

<body>

<div class="container-fluid report-container">

    <!-- TOP -->
    <div class="top-bar">

        <div>

            <h1 class="report-title">
                Vehicle Reports
            </h1>

            <p class="text-muted">
                Monitoring status kendaraan
            </p>

        </div>

        <div>

            <a href="{{ route('reports.export.vehicle.pdf') }}"
               class="btn btn-danger">
                Export PDF
            </a>

            <a href="/admin/dashboard"
               class="btn btn-dark">
                Dashboard
            </a>

        </div>

    </div>

    <!-- STATISTIC -->
    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card card-custom stat-card">

                <div class="stat-title">
                    Total Kendaraan
                </div>

                <div class="stat-value">
                    {{ $totalVehicles }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card card-custom stat-card">

                <div class="stat-title">
                    Tersedia
                </div>

                <div class="stat-value">
                    {{ $availableVehicles }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card card-custom stat-card">

                <div class="stat-title">
                    Disewa
                </div>

                <div class="stat-value">
                    {{ $rentedVehicles }}
                </div>

            </div>

        </div>

    </div>

    <!-- TABLE -->
    <div class="card card-custom">

        <div class="card-body">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Kendaraan</th>
                        <th>Plat Nomor</th>
                        <th>Harga Sewa</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($vehicles as $vehicle)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $vehicle->nama_kendaraan }}
                        </td>

                        <td>
                            {{ $vehicle->plat_nomor }}
                        </td>

                        <td>
                            Rp {{ number_format($vehicle->harga_sewa,0,',','.') }}
                        </td>

                        <td>

                            @if($vehicle->status_ketersediaan == 'tersedia')

                                <span class="badge badge-success">
                                    Tersedia
                                </span>

                            @else

                                <span class="badge badge-warning">
                                    Disewa
                                </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>

</html>