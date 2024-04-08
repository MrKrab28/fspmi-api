@extends('layout')

@section('content')
    <div class="container">

        <div class="row inbox-wrapper">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 email-aside border-lg-right">
                                <div class="aside-content">
                                    <div class="aside-header">
                                        <button class="navbar-toggle" data-target=".aside-nav" data-toggle="collapse"
                                            type="button"><span class="icon"></span></button><span class="title"><i
                                                class="ti ti-mail"></i>Pengaduan</span>
                                        <p class="description">{{ $pengaduan->user->email }}</p>
                                    </div>
                                    <div class="aside-compose">
                                        <h3>Lampiran</h3>
                                        <img src="{{ asset('f/foto-lampiran/' . $pengaduan->lampiran) }}"
                                            style="height: 300px;width:300px" alt="">
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-8 email-content">
                                <div class="email-head">
                                    <div class="email-head-subject">
                                        <div class="title d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center">

                                                <h3> <i class="ti ti-mail-opened"
                                                        style="width: 96px;height:96px"></i>{{ $pengaduan->judul }}</h3>
                                            </div>

                                            <button type="submit" class="btn btn-primary " data-bs-toggle="modal"
                                                data-bs-target="#exampleModal">Balas Pesan</button>

                                        </div>
                                    </div>
                                    <div
                                        class="email-head-sender d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar">

                                                <img src="{{ asset('f/foto-profile/' . $pengaduan->user->foto_profile) }}"
                                                alt="Avatar" class="rounded-circle user-avatar-md"
                                                style="height: 100px;width:100px">



                                            </div>
                                            <div class="sender d-flex align-items-center">
                                                <h3 href="#">{{ $pengaduan->user->nama }}</h3>

                                            </div>
                                        </div>
                                        <div class="date">
                                            {{ Carbon\Carbon::parse($pengaduan->created_at)->isoFormat('D MMMM YYYY, HH:mm::ss') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="email-body">
                                    {!! $pengaduan->detail !!}
                                </div>

                            </div>
                        </div>


                        <div class="container my-0 py-4">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-4 col-lg-8">
                                    <div class="card text-dark">
                                        <div class="card-body p-4">
                                            <h4 class="mb-0">Balasan Pengaduan</h4>
                                            <p class="fw-light mb-4 pb-2"></p>
                                            @foreach ($pengaduan->balasan as $balasan )

                                            <div class="d-flex flex-start">
                                                @if($balasan->pengirim == 'anggota')
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="{{ asset('f/foto-profile/' . $pengaduan->user->foto_profile) }}"
                                                    alt="avatar" width="60" height="60" />
                                                @else
                                                <img class="rounded-circle shadow-1-strong me-3"
                                                    src="{{ asset('f/foto-profile/default.png') }}"
                                                    alt="avatar" width="60" height="60" />
                                                    @endif
                                                    <div>

                                                    @if ($balasan->pengirim == 'anggota')

                                                    <h6 class="fw-bold mb-1">{{ $pengaduan->user->nama }}</h6>
                                                    @else
                                                    <h6 class="fw-bold mb-1">Admin</h6>

                                                    @endif
                                                    <div class="d-flex align-items-center mb-3">
                                                        <p class="mb-0">
                                                                {{ Carbon\Carbon::parse($balasan->pengaduan->tgl_pengaduan)->isoFormat('DD MMMM YYYY')  }}
                                                            <span class="badge bg-primary ms-1 timestamp">{{ $balasan->created_at->diffForHumans() }}</span>
                                                        </p>

                                                    </div>
                                                    <p class="mb-3">
                                                     {{ $balasan->isi_balasan }}
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            @endforeach

                                        </div>
                                        <hr class="my-0" style="height: 1px;" />
                                    </div>
                                </div>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Isi Balasan Pengaduan
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('balas-pengaduan') }}" method="POST">
                    @csrf

                    <div class="modal-body">
                        <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id }}">
                        <input type="hidden" name="parent" value="0">
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
                            <label for="nominal" class="form-label">Balasan</label>
                            <textarea name="isi_balasan" class="form-control" id="" cols="10" rows="6"></textarea>
                        </div>

                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary">Balas</button>
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
