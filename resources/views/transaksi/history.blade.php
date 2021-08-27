@extends('layouts.app')
@section('top-script')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
@endsection
@section('body')
@section('title','History')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row" style="margin-left: 1px;">
                <div class="col-xs-2">
                        <select class="form-control" width="50px"  name="waktu" id="waktu">
                            <option value="">Pilih Prolat</option>
                            @foreach($tahuns as $tahun)
                                <option value="{{$tahun->tahun}}">{{$tahun->tahun}}</option>
                            @endforeach
                        </select>
                </div>
                </div>
                <hr>
                <div class="section-header">
                    <center><b><h5>Pelatihan</h5></b></center>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center"> No</th>
                                <th>Diklat</th>
                                <th>Pelatihan</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <br>
                    <hr>
                    <div class="section-header">
                        <center><b><h5>Usulan</h5></b></center>
                    </div>
                    <hr>
                    <!-- usulan -->
                    <table class="table table-striped" id="table-u">
                        <thead>
                            <tr>
                                <th class="text-center"> No</th>
                                <th>Usulan</th>
                                <th>Jumlah Pelatihan</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Modal Laporan -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-laporan">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Input <span id="txt-mesin"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered" width='100%' id="table-laporan">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nip</th>
                            <th>Kanwil</th>
                            <th>Upt</th>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('bottom-script')
<script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
 $(function () {
        GetData();
 });
</script>
<script>

// get data
function GetData(id=null) {
        $("#table").dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('transaksi.historyData')}}",
                data: {
                    id: id
                }
            },
            destroy: true,
            scrollX: true,
            scrollCollapse: true,
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    "width": "5%"
                },
                {
                    data: 'nama_diklat',
                    "width": "20%"
                },
                {
                    data: 'pelatihan',
                    "width": "20%"
                },
                {
                    data: 'jumlah',
                    "width": "20%"
                },
            ],
            fixedColumns: true,
        });
        $("#table-u").dataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{route('transaksi.historyDataUsulan')}}",
                data: {
                    id: id
                }
            },
            destroy: true,
            scrollX: true,
            scrollCollapse: true,
            columns: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    "width": "5%"
                },
                {
                    data: 'usulan',
                    "width": "20%"
                },
                {
                    data: 'jumlah',
                    "width": "20%"
                },
            ],
            fixedColumns: true,
        });
}
$("#waktu").change(function(){
    var id = $(this).val();
    GetData(id);
});

</script>
@endsection
