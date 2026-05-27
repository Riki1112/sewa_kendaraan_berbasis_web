<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        Booking Reports
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
                Booking Reports
            </h1>

            <p class="text-muted">
                Monitoring booking dan pembayaran kendaraan
            </p>

        </div>

        <div>

            <a href="{{ route('reports.export.pdf') }}"
               class="btn btn-danger">

                Export PDF

            </a>

            <a href="/admin/dashboard"
               class="btn btn-dark">

                Dashboard

            </a>

        </div>

    </div>

    <!-- FILTER -->
    <div class="card card-custom mb-4">

        <div class="card-body">

            <form method="GET" class="row g-3">

                <div class="col-md-3">

                    <input
                        type="date"
                        name="start_date"
                        class="form-control"
                    >

                </div>

                <div class="col-md-3">

                    <input
                        type="date"
                        name="end_date"
                        class="form-control"
                    >

                </div>

                <div class="col-md-3">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Filter
                    </button>

                </div>

            </form>

        </div>

    </div>

    <!-- STATISTIC -->
    <div class="row mb-4">

        <div class="col-md-4">

            <div class="card card-custom stat-card">

                <div class="stat-title">
                    Total Booking
                </div>

                <div class="stat-value">
                    {{ $bookings->count() }}
                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card card-custom stat-card">

                <div class="stat-title">
                    Total Revenue
                </div>

                <div class="stat-value">
                    Rp {{ number_format($totalRevenue) }}
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
                        <th>User</th>
                        <th>Vehicle</th>
                        <th>Status</th>
                        <th>Date</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($bookings as $booking)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $booking->user->name }}
                        </td>

                        <td>
                            {{ $booking->vehicle->nama_kendaraan }}
                        </td>

                        <td>

                            @if($booking->status_booking == 'dibayar')

                                <span class="badge badge-success">

                                    Dibayar

                                </span>

                            @else

                                <span class="badge badge-warning">

                                    Pending

                                </span>

                            @endif

                        </td>

                        <td>

                            {{ $booking->createdDate ?? '-' }}

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