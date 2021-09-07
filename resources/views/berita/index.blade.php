@extends('layouts.app')

@section('top-script')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
<style>
    .is-invalid-custom{
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
@section('title','Berita')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('beritas.create')}}" class="btn btn-md btn-primary"><i class='fa fa-plus'></i>&nbsp;Tambah</a>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered" id="table-data">
                        <thead>
                            <th>No</th>
                            <th>judul</th>
                            <th>Tanggal</th>
                            <th>Author</th>
                            <th>Status</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            <?php $no=0;?>
                            @foreach($beritas as $berita)
                            <?php $no++; ?>
                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$berita->judul}}</td>
                                <td>{{$berita->tanggal}}</td>
                                <td>{{$berita->user->name}}</td>
                                @if($berita->status == 1)
                                    <td>Pusblish</td>
                                @else 
                                    <td>Draft</td>
                                @endif
                                <td>
                                    <a class="badge badge-success" href="{{route('beritas.edit',$berita->id )}}" ><span class="fas fa-fw fa-edit"></span></a>
                                    <a href="/beritaD/{{$berita->id}}" class="badge badge-danger" class="" ><span class="fas fa-fw fa-trash"></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection