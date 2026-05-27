<!DOCTYPE html>
<html>

<head>
    <title>Booking Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Booking Report</h2>

    <p class="total-revenue">
        Total Revenue: <strong>Rp {{ number_format($totalRevenue, 0, ',', '.') }}</strong>
    </p>

    <table>
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
                <td>{{ $loop->iteration }}</td>
                <td>{{ $booking->user->name }}</td>
                <td>{{ $booking->vehicle->nama_kendaraan }}</td>
                <td>{{ ucfirst($booking->status_booking) }}</td>
                <td>
                    {{ optional(\Carbon\Carbon::parse($booking->created_at))->format('d-m-Y H:i') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>