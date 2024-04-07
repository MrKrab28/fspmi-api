@extends('layout')

@section('content')
    <div class="container">
        <div class="row mx-0 justify-content-center">
            <div class="col-md-12 col-lg-4 px-lg-2 col-xl-4 px-xl-0 px-xxl-3">
                <form method="POST" class="w-100 rounded-1 p-4 border bg-white" action="{{ route('user-pengaduan-store') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Nama Pengirim</span>
                        <input name="name" readonly type="text" class="form-control"
                            placeholder="{{ auth()->user()->nama }}" />
                    </label>
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Judul Pengaduan</span>
                        <input name="judul" type="text" class="form-control" />
                    </label>
                    <label class="d-block mb-4">
                        <span class="form-label d-block">Lampiran</span>
                        <input name="lampiran" type="file" class="form-control" required/>
                    </label>

                    <label class="d-block mb-4">
                        <span class="form-label d-block">isi Pengaduan</span>
                        <textarea name="detail" class="form-control" rows="5" placeholder="Please describe your problem"></textarea>
                    </label>
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-2">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary px-3 rounded-3">
                                Kirim
                            </button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
