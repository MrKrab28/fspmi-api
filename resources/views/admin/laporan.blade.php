@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-nowrap">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Cetak Laporan</h4>
                        </div>
                    </div>
                    <div class="card-body text-nowrap">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="d-flex justify-content-center"></div>
                                <button type="submit" class="btn btn-primary me-auto" onclick="document.location.href = '{{ route('laporan-iuran') }}'">Cetak Laporan Iuran </button>
                            </div>
                            <div class="col-sm-6">

                                <button type="submit" class="btn btn-primary me-auto" onclick="document.location.href = '{{ route('laporan-pengeluaran') }}'">Cetak Laporan Pengeluaran </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('modals')
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Pengeluaran
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('pengeluaran-store') }}" method="POST">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="keperluan" class="form-label">keperluan</label>
                            <input type="text" class="form-control" id="keperluan" name="keperluan" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Pengeluaran</label>
                            <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal Pembayaran Iuran</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" autocomplete="off"
                                required>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush
@push('styles')
    @include('includes.datatables.styles')
    @include('includes.choices-js.styles')
@endpush

@push('scripts')
    @include('includes.datatables.scripts')
    @include('includes.choices-js.scripts')
    <script>
        $(document).ready(function() {
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
                    $('#formDelete' + id).submit()
                }
            });
        }
    </script>
@endpush
