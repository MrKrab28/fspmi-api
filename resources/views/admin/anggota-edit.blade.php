@extends('layout')

@section('content')
    {{-- <div class="row">
            <div class="col-6"></div>
        </div> --}}
    <div class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="{{ asset('f/foto-ktp/' . $user->foto_ktp) }}"
                                    style="height: 150px;width:150px;border-radius:50%" alt="" class="pict-oval">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="card me-0">
                        <div class="card-body">
                            <form action="{{ route('anggota-update', $user->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="text-center mb-4">
                                    <img src="{{ asset('f/foto-profile/' . $user->foto_profile) }}"
                                        style="height: 150px;width:150px;border-radius:50%" alt=""
                                        class="pict-oval">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="nim">Nama Anggota</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $user->nama }}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="nama">Email</label>
                                    <input type="email" class="form-control" id="nama" name="email"
                                        value="{{ $user->email }}" autocomplete="off" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="L"
                                            id="jkL" {{ $user->jk == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jkL">
                                            Laki-laki
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="P"
                                            id="jkP" {{ $user->jk == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jkP">
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="no_hp">No.Hp</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="{{ $user->no_hp }}" autocomplete="off" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="no_hp">Ganti Foto Profil</label>
                                    <input type="file" class="form-control" id="foto_profile" name="foto_profile"
                                        autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="no_hp">Ganti Foto KTP</label>
                                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp"
                                        autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" value=""
                                        name="password">
                                    <small id="passHelp" class="form-text text-muted">Kosongkan jika tidak ingin
                                        mengganti
                                        password</small>
                                </div>
                        </div>
                        <div class="card-footer text-right pb-4 mt-0">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')
    <style>
        .pict-oval {
            object-fit: cover;
        }
    </style>
@endpush
