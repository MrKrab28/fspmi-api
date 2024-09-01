<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Resetting some default styles */
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

        /* Table styles */
        .table {
            width: 100%;
            border-collapse: collapse;
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

        .text-center {
            text-align: center;
        }

        /* Form styles */
        form {
            display: inline;
        }

        .d-inline {
            display: inline;
        }

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

    <h3 style="margin: 0">Laporan Iuran</h3>
    {{-- <p class="mt-0">Tanggal: {{ Carbon\Carbon::now()->isoFormat('D MMMM YYYY') }}</p> --}}

    <table id="table" class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Anggota</th>
                <th>No. HP</th>
                <th>Total Iuran</th>
                <th>Pembayaran Terakhir</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($iuran as $iuran)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $iuran->user->nama }}</td>
                    <td>{{ $iuran->user->no_hp }}</td>
                    <td>Rp. {{ number_format($iuran->items->sum('nominal')) }}</td>
                    <td>{{ Carbon\Carbon::parse($iuran->items->sortByDesc('tgl_bayar')->first()->tgl_bayar)->isoFormat('MMMM YYYY') }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
