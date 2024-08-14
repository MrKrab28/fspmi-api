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
                                <img src="{{ asset('assets/images/logos/LOGOFSPMI.png') }}" alt=""
                                    class="w-100 rounded">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-5">
                    <div class="card me-0">
                        <div class="card-header">
                            <h4>FAQ Edit</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('faq.update', $faq->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="pertanyaan">Pertanyaan</label>
                                    <input type="text" class="form-control" id="pertanyaan" name="pertanyaan"
                                        value="{{ $faq->pertanyaan }}" autocomplete="off">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-0" for="jawaban">Jawaban</label>
                                    <input type="text" class="form-control" id="jawaban" name="jawaban"
                                        value="{{ $faq->jawaban }}" autocomplete="off" required>
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
