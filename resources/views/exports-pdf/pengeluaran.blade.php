<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Reset some default styles */
        body,
        h4,
        table,
        th,
        td {
            margin: 0;
            padding: 0;
            border: 0;
            box-sizing: border-box;
        }

        /* Body styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Container styles */
        .container-fluid {
            width: 100%;
            padding: 0 15px;
            margin: auto;
        }

        /* Card styles */
        .card {
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .card-header {
            background: #007bff;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 15px;
        }

        /* Header title */
        .header-title h4 {
            margin: 0;
        }

        /* Button styles */
        .btn {
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-sm {
            padding: 5px 10px;
            font-size: 12px;
        }

        /* Table styles */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table thead th {
            background: #f8f9fa;
        }

        .table-hover tbody tr:hover {
            background: #f1f1f1;
        }

        /* Text alignment */
        .text-center {
            text-align: center;
        }

        .mt-0 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <div class="text-center">
        <img src="{{ asset('assets/images/logos/LOGOFSPMI.png') }}" width="200" alt="">
        <h5 class="mt-0">Federasi Serikat Pekerja Metal Indonesia</h5>
    </div>

    <h3 style="margin: 0">Laporan Pengeluaran</h3>
    {{-- <p class="mt-0">Tanggal: {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p> --}}


    <table id="table" class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Keperluan</th>
                <th>Jumlah Pengeluaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pengeluaran as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->keperluan }}</td>
                    <td>Rp. {{ number_format($item->jumlah) }}</td>
                    <td>{{ Carbon\Carbon::parse($item->tanggal)->isoFormat('DD MMMM YYYY') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
