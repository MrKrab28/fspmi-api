@extends('layout')

@section('content')

    <div class="container-fluid content-inner mt-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="card text-nowrap">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Daftar Detail Iuran</h4>
                        </div>
                      
                    </div>
                    <div class="card-body text-nowrap">

                        <div class="table-reponsive">
                            {{-- <table id="table" class="table table-striped mt-5" data-toggle="data-table"> --}}
                            <table id="table" class="table table-hover mt-5" style="width: 100%">
                                <thead>
                                    <tr>

                                        <th>No</th>
                                        <th>Nominal</th>
                                        <th>Tanggal Pembayaran</th>



                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($iuran->items->sortByDesc('tgl_bayar') as $iuran)
                                        <tr>

                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $iuran->nominal }}</td>
                                            <td>{{ $iuran->tgl_bayar }}</td>




                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Daftar Iuran
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('iuran-store.item') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="iuran" value="{{ Request::get('iuran') }}">
                        {{-- <div class="mb-3">
                            <label for="anggota" class="form-label">Anggota</label>
                            <select class="form-select js-choice" id="anggota" name="id_anggota" required>
                                <option value="">Pilih</option>
                                @foreach ($daftarAnggota as $anggota)
                                    <option value="{{ $anggota->id }}">{{ $anggota->nama }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label for="nominal" class="form-label">Nominal Iuran</label>
                            <input type="number" class="form-control" id="nominal" name="nominal" autocomplete="off"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_bayar" class="form-label">Tanggal Pembayaran Iuran</label>
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" autocomplete="off"
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
