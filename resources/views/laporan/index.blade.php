@extends('layouts.app')
@section('top-script')
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
@endsection
@section('body')
@section('title','Butuh Perbaikan Segera')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="form-group row" style="margin-left: 1px;">
                <div class="col-xs-2">
                    <!-- <div class="form-group"> -->
                        <!-- <label>Default Select</label>
                        <br> -->
                        <select class="form-control" width="50px"  name="waktu" id="waktu">
                            <option value=''>Filter Tampil Hari</option>
                            <option value="2">H -2</option>
                            <option value="3">H -3</option>
                            <option value="7">H -7</option>
                            <option value="14">H -14</option>
                            <option value="21">H -21</option>
                            
                        </select>
                    <!-- </div> -->
                </div>
                </div>
                <div class="table-responsive">
                      <table class="table table-striped" id="table">
                        <thead>
                            <tr>
                                <th class="text-center"> No</th>
                                <th>Diklat</th>
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
                    data: 'diklat_id',
                    "width": "20%"
                },
                {
                    data: 'diklat_id',
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
