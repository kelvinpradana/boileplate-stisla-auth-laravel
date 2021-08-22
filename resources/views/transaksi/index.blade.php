@extends('layouts.app')


@section('top-script')

@endsection
@section('body')
@section('title','Dashboard')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h6>Silahkan pilih diklat maksimal 3 diklat</h6>
            </div>
            <div class="card-body">
            <div class="row mt-4">
                <div class="wizard-steps">
                    @foreach($diklats as $diklat)
                        <div class="wizard-step">
                            <div class="wizard-step-label">
                                <a href="#" data-id='{{$diklat->id}}' onclick="OpenModalAdd(this)"> {{$diklat->nama}}</a>
                            </div>
                            <div class="btn btn-group mt-5">
                                @if($diklat->qty>0)
                                {{-- <button class="btn btn-md btn-info">{{ $diklat->qty }}</button> --}}
                                <button class="btn btn-md btn-warning" data-id='{{$diklat->id}}' onclick="ResetSubDiklat(this)"><i class="fas fa-trash"></i></button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="wizard-step wizard-step">
                        <div class="wizard-step-icon">
                            <!-- <i class="fas fa-tshirt"></i> -->
                        </div>
                        <div class="wizard-step-label">
                            <a href="#" onclick="OpenModalUsulan()"> Usulan</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center">
                    <button class="btn btn-md btn-warning" onclick="ResetAll()"><i class="fas fa-trash"></i>&nbsp;Reset</button>
                    <button class="btn btn-md btn-info" onclick="SaveAll()"><i class="fas fa-check"></i>&nbsp;Simpan</button>
                </div>
                {{-- </div> --}}
            </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-add">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="javascript:void(0)" id="form-add">
            <div class="modal-body">
                @csrf
                <input type="hidden" id="diklat_id">
                <div class="form-group">
                    <table style="width: 100%;" class="table table-bordered" id='tables'>
                    </table>
                
                </div>
                <span id="alert" class="text-danger text-center"></span>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal usulan -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-usulan">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Usulan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="javascript:void(0)" id="form-usulan">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('bottom-script')
<script src="{{ asset('node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>

<script>
</script>
<script>

    $(function() {
        // preven add
        $("#form-add").on("submit", function(e) {
            e.preventDefault();
            AddData();
        });

        // preven update
        // $("#form-update").on("submit", function(e) {
        //         e.preventDefault();
        //         update();
        // });
    })
    function OpenModalAdd(object){
        var id = $(object).data('id');
        $("#diklat_id").val(id);
        $('#modal-add').modal('show');
        $('#tables').empty();
        $('#alert').html('');
        $.ajax({
            url: "{{route('transaksi.getSubDiklat')}}",
            type: "GET",
            dataType: "json",
            data: {
                "id": id,
            },
            success(result) {
                var pelatihan = [];
                var nama_pelatihan = [];
                var edit_pelatihan = [];
                var edit_jml = [];

                $.each(result['datas'], function(key, value) {
                    pelatihan.push(value.id);
                    nama_pelatihan.push(value.nama);
                });
                // 
                $.ajax({
                    url: "{{route('transaksi.getSubDiklatEdit')}}",
                    type: "GET",
                    dataType: "json",
                    data: {
                        "id": id,
                        "tahun" : '2021'
                    },
                    success(response) {
                        $.each(response.data, function(key, value) {
                            edit_pelatihan.push(value.sub_diklat_id);
                            edit_jml.push(value.jumlah);
                        });
                        console.log(edit_jml);
                        if (result['datas'] != null) {
                            var jml = pelatihan.length;
                            var status = "";
                            var edit_jmls = [];
                            var z=0;
                            for (i = 0; i < pelatihan.length; i++) {
                              
                               if(edit_pelatihan.includes(pelatihan[i])){
                                    edit_jmls.push(edit_jml[z]);
                                    z++;
                               }
                               else {
                                    edit_jmls.push(0);
                               }
                           }
                           //end tail
                            for (i = 0; i < pelatihan.length; i++) {
                               
                                // if(in_array(pelatihan[i],edit_pelatihan)!= -1){
                                //     status = "checked";
                                // }
                                console.log('aa',edit_pelatihan);
                                // if(pelatihan.includes(edit_pelatihan[i])){
                                //     status = "checked";
                                // }
                                if(edit_pelatihan.includes(pelatihan[i])){
                                    status = "checked";
                                   
                                }
                                else {
                                    status = "";
                                }

                                console.log('hasil',edit_jmls[i]);
                                // 
                                var li = $('<tr><td><div class=""><input class="form-check-input pelatihan" onclick="handleClick(this,' + i + ')" type="checkbox" '+status+' name="' + nama_pelatihan[i] + '" value="' +pelatihan[i] + '" id="pelatihan' + pelatihan[i] + '"/>' +
                                '<label for="' + nama_pelatihan[i] + '"></label></div></td><td><input class="form-control" name="jml[]" value="' +edit_jmls[i] + '" class="jml" id="jml' + i + '" type="text" disabled></td</tr>');
                                li.find('label').text(nama_pelatihan[i]);
                                $('#tables').append(li);
                                // 
                                // var li = $('<div class="permissions"<li><input class="form-check-input permission" type="checkbox" '+status+' name="'+ pelatihan[i] + '" value="' + pelatihan[i] + '" id="pelatihan' + pelatihan[i] + '"/>' +
                                //     '<label for="' + pelatihan[i] + '"></label></li><div>');
                                // li.find('label').text(pelatihan[i]);
                                // console.log('ai',pelatihan[i]);
                                // var li = $('<tr><td><div class=""><input class="form-check-input pelatihan" onclick="handleClick(this,' + pelatihan[i] + ')" type="checkbox" name="' + pelatihan[i] + '" value="' +id[i] + '" id="pelatihan' + value.id + '"/>' +
                                // '<label for="' + key + '"></label></div></td><td><input name="jml[]" class="jml" id="jml' + value.id + '" type="text" disabled></td</tr>');
                                // li.find('label').text(value.nama);
                                $('#tables').append(li);
                            }
                        }
                    },
                    error(xhr, status, error) {
                        var err = eval('(' + xhr.responseText + ')');
                        notification(status, err.message);
                        checkCSRFToken(err.message);
                    }
                });
                // $.each(response.datas, function(key, value) {
                //     console.log(value.nama)
                //     var li = $('<tr><td><div class=""><input class="form-check-input pelatihan" onclick="handleClick(this,' + value.id + ')" type="checkbox" name="' + key + '" value="' + value.id + '" id="pelatihan' + value.id + '"/>' +
                //         '<label for="' + key + '"></label></div></td><td><input name="jml[]" class="jml" id="jml' + value.id + '" type="text" disabled></td</tr>');
                //     li.find('label').text(value.nama);
                //     $('#tables').append(li);

                // });
            },
            // error(xhr, status, error) {
            //     var err = eval('(' + xhr.responseText + ')');
            //     notification(status, err.message);
            //     checkCSRFToken(err.message);
            // }
        });
    }

    function OpenModalUsulan(){
        $('#modal-usulan').modal('show');
    }

    function handleClick(cb,val) {
        // console.log("Clicked, new value = ",cb.checked);
        if(cb.checked){
            $('#jml'+val).prop('disabled', false);
        }
        else{
            $('#jml'+val).prop('disabled', true);
        }
        var count = $('input[name="pelatihan"]:checked').length;
        console.log(count)
    }

    function AddData() {
        var form=$("body");
            form.find('.invalid-feedback').remove();
            form.find('.form-group .is-invalid').removeClass('is-invalid');
        var tahun = 2021;
        var pelatihans = [];
        var diklat_id = $("#diklat_id").val();
        var jml = $('input[name^=jml]').map(function(idx, elem) {
            return $(elem).val();
        }).get();
        $('.pelatihan').each(function() {
            if ($(this).is(":checked")) {
                pelatihans.push($(this).val());
            }
        });
        if(pelatihans.length>3){
            $('#alert').html('Pilihan Sub Diklat maksimal 3!')
        }else{
            $.ajax({
                url: "{{ route('transaksi.store') }}",
                type: "POST",
                dataType: "json",
                data: {
                    "pelatihan": pelatihans,
                    "tahun": tahun,
                    "jml": jml,
                    "diklat_id" : diklat_id,
                    "_token": "{{ csrf_token() }}"
                },
                // beforeSend() {
                //     $("input").attr('disabled', 'disabled');
                //     $("button").attr('disabled', 'disabled');
                // },
                // complete() {
                //     $("input").removeAttr('disabled', 'disabled');
                //     $("button").removeAttr('disabled', 'disabled');
                // },
                success(result) {
                    $("#form-add")[0].reset();
                    $('#modal-add').modal('hide');

                    if(result.status=='success'){
                        iziToast.success({
                            title: result.status,
                            message: result.message,
                            position: 'topRight'
                        });
                    }else{
                        iziToast.error({
                            title: result.status,
                            message: result.message,
                            position: 'topRight'
                        });
                    }
                },
                error(xhr, status, error) {
                    var err = eval('(' + xhr.responseText + ')');
                    // toastr.error(err.message);
                },
                // error: function(response) {
                //     $.each(response.responseJSON.errors, function(key, value) {
                //         $("input[name="+key+"]").addClass('is-invalid').after('<div class="invalid-feedback">'+value+'</div>');
                //         $(".show-error").addClass('is-invalid').after('<div class="invalid-feedback">'+value+'</div>');

                //     })
                // }
            });
        }
    }

    function ResetSubDiklat(object){
        var id = $(object).data('id');

        $.ajax({
            url: "{{ route('transaksi.reset') }}",
            type: "POST",
            dataType: "json",
            data: {
                "diklat_id" : id,
                "_token": "{{ csrf_token() }}",
                "_method": "DELETE"
            },
            success(result) {
                iziToast.success({
                    title: result.status,
                    message: result.message,
                    position: 'topRight'
                });
            },
            error(xhr, status, error) {
                var err = eval('(' + xhr.responseText + ')');
            },
        });
    }

    function SaveAll(){
        $.ajax({
            url: "{{ route('transaksi.saveall') }}",
            type: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}"
            },
            success(result) {

                if(result.status=='success'){
                    iziToast.success({
                        title: result.status,
                        message: result.message,
                        position: 'topRight'
                    });
                }else{
                    iziToast.error({
                        title: result.status,
                        message: result.message,
                        position: 'topRight'
                    });
                }
            },
            error(xhr, status, error) {
                var err = eval('(' + xhr.responseText + ')');
            },
        });
    }

    function ResetAll(){
        $.ajax({
            url: "{{ route('transaksi.resetall') }}",
            type: "POST",
            dataType: "json",
            data: {
                "_token": "{{ csrf_token() }}",
                "_method": "DELETE"
            },
            success(result) {
                iziToast.success({
                    title: result.status,
                    message: result.message,
                    position: 'topRight'
                });
            },
            error(xhr, status, error) {
                var err = eval('(' + xhr.responseText + ')');
            },
        });
    }
</script>

@endsection
