@extends('layouts.app')

@section('top-script')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.css') }}">

<style>
    .is-invalid-custom {
        border-color: #dc3545 !important;
    }

    .invalid-feedback-custom {
        width: 100%;
        margin-top: .25rem;
        font-size: 80%;
        color: #dc3545;
    }
</style>
@endsection
@section('body')
@section('title','Tambah Berita')
<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="{{route('beritas.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Judul</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="text"  name="judul" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Status</label>
                        <div class="col-sm-12 col-md-9">
                            <select class="form-control selectric" name="status">
                                <option value="0">Draft</option>
                                <option value="1">Publish</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Content</label>
                        <div class="col-sm-12 col-md-9">
                            <textarea class="summernote" name="isi"></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Tanggal</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="text"  name="tanggal" class="form-control datepicker">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2">Gambar</label>
                        <div class="col-sm-12 col-md-9">
                            <input type="file"  name="img" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-2 col-lg-2"></label>
                        <div class="col-sm-12 col-md-7">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('bottom-script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('node_modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- <script src="{{asset('/node_modules/summernote/summernote-bs4.js')}}"></script> -->
@endsection