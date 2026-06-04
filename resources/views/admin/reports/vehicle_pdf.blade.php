<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Report</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table,th,td{
            border:1px solid black;
        }

        th,td{
            padding:8px;
        }

        th{
            background:#eee;
        }

    </style>
</head>
<body>

<h2>Vehicle Report</h2>

<table>

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

            <td>{{ $loop->iteration }}</td>

            <td>{{ $vehicle->nama_kendaraan }}</td>

            <td>{{ $vehicle->plat_nomor }}</td>

            <td>
                Rp {{ number_format($vehicle->harga_sewa,0,',','.') }}
            </td>

            <td>{{ $vehicle->status_ketersediaan }}</td>

        </tr>

        @endforeach

    </tbody>

</table>

</body>
</html>