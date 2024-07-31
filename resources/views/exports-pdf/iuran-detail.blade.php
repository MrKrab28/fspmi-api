<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /* Resetting some default styles */
        body, h4, table, th, td {
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
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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

        .table th, .table td {
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

        /* Responsive styles */
        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .table-responsive {
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

    <div class="container-fluid content-inner mt-2">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Laporan Iuran</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Anggota</th>
                                <th>Total Iuran</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Status Setoran Bulan Ini</th>
                                <th>No. HP</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iuran as $iuran)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $iuran->user->nama }}</td>
                                    <td>{{ $iuran->items->sum('nominal') }}</td>
                                    <td>{{ $iuran->items[0]->tgl_bayar }}</td>
                                    <td>{{ $iuran->status }}</td>
                                    <td>{{ $iuran->user->no_hp }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        @include('includes.datatables.styles')
        @include('includes.choices-js.styles')
    @endpush

    @push('scripts')
        @include('includes.datatables.scripts')
        @include('includes.choices-js.scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                $('#table').DataTable({
                    responsive: true,
                    sort: false
                });
            });

            function deleteData(id) {
                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Data Ini Akan Terhapus Dari Database",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, Hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('formDelete' + id).submit();
                    }
                });
            }
        </script>
    @endpush
</body>
</html>
