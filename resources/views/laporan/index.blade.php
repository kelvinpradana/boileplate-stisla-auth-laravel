@extends('layouts.app')
@section('top-script')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
@endsection
@section('body')
@section('title','Ranking')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row" style="margin-left: 1px;">
                <div class="col-xs-2">
                        <select class="form-control" width="50px"  name="waktu" id="waktu">
                            @foreach($diklats as $diklat)
                                <option value="{{$diklat->id}}">{{$diklat->nama}}</option>
                            @endforeach
                        </select>
                </div>
                </div>
                <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center"> No</th>
                                <th>Diklat</th>
                                <th>Pelatihan</th>
                                <th>Pelatihan</th>
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
                url: "{{route('laporan.data')}}",
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
                    data: 'diklat',
                    "width": "20%"
                },
                {
                    data: 'nama',
                    "width": "20%"
                },
                {
                    data: 'qty',
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
