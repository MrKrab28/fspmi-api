@extends('layout')

@section('content')
    <div class="container-fluid content-inner mt-2">
        <div class="row align-items-center">
            <div class="col-md-6 text-center d-none d-md-block">
                <img src="{{ asset('assets/images/docs.svg') }}" class="w-75" alt="">
            </div>
            <div class="col-md-6">
                <div class="card text-nowrap">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="header-title">
                            <h4 class="mb-0">Cetak Laporan</h4>
                        </div>
                    </div>
                    <div class="card-body text-nowrap">

                        <div class="list-group">
                            <button type="button" class="list-group-item list-group-item-action"
                                onclick="window.open('{{ route('laporan-iuran') }}', '_blank')">
                                Laporan Iuran
                            </button>
                            <button type="button" class="list-group-item list-group-item-action"
                                onclick="window.open('{{ route('laporan-pengeluaran') }}', '_blank')">
                                Laporan Pengeluaran
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
