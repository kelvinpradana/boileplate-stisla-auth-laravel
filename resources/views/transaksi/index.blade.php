@extends('layouts.app')
@section('top-script')
@endsection
@section('body')
@section('title','Input Pelatihan')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h6>Silahkan pilih maksimal 5 Pelatihan</h6>
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
                        <div class="wizard-step-label">
                            <a href="#" onclick="OpenModalUsulan()"> Usulan</a>
                        </div>
                        @if($usulans>0)
                        <div class="btn btn-group mt-5">
                            {{-- <button class="btn btn-md btn-info">{{ $diklat->qty }}</button> --}}
                            <button class="btn btn-md btn-warning" onclick="ResetUsulan()"><i class="fas fa-trash"></i></button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-12 text-center">
                <button class="btn btn-md btn-info" onclick="Preview()"><i class="fa fa-arrow-right"></i>&nbsp;Next</button>
                    <!-- <button class="btn btn-md btn-warning" onclick="ResetAll()"><i class="fas fa-trash"></i>&nbsp;Reset</button>
                    <button class="btn btn-md btn-info" onclick="SaveAll()"><i class="fas fa-check"></i>&nbsp;Simpan</button> -->
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
            <input type="hidden" name="tahun" id="tahun" value="{{$tahun->tahun}}">
            <div class="modal-body">
                @csrf
                <input type="hidden" id="diklat_id">
                <div class="form-group">
                    <table style="width: 100%;" class="table table-bordered" id='tables'>
                        <tr bgcolor='#e3dcce'>
                            <th>Pelatihan</th>
                            <th>Jumlah Peserta</th>
                        </tr>
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
            <form method="POST" action="javascript:void(0)" id="form-usulan" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="newRowJumlah">
                </div>
                <button class="addRowJumlah btn btn-info" type="button">Add Row</button>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- preview -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal-preview">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Preview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="javascript:void(0)" id="form-add">
            <div class="modal-body">
                <table style="width: 100%;" class="table table-bordered" id='tables-p'>
                    <tr>
                        <th>Diklat</th>
                        <th>Pelatihan</th>
                        <th>Jumlah Peserta</th>
                        <th>Prolat</th>
                    </tr>
                </table>
                <table style="width: 100%;" class="table table-bordered" id='tables-u'>
                    <tr>
                        <th>Usulan</th>
                        <th>Jumlah Peserta</th>
                    </tr>
                </table>
            </div>
            <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button class="btn btn-md btn-warning" onclick="ResetAll()"><i class="fas fa-trash"></i>&nbsp;Reset</button>
                    <button class="btn btn-md btn-info" onclick="SaveAll()"><i class="fas fa-check"></i>&nbsp;Simpan</button>
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

    function in_array(needle, haystack){
        var found = 0;
        for (var i=0, len=haystack.length;i<len;i++) {
            if (haystack[i] == needle) return i;
                found++;
        }
        return -1;
    }

    function OpenModalAdd(object){
        var id = $(object).data('id');
        var tahun  = $("#tahun").val();
        $("#diklat_id").val(id);
        $('#modal-add').modal('show');
        if($('#tables').find("tr:not(:nth-child(1))")){
            $('#tables').find("tr:not(:nth-child(1))").remove();
        }
       
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
                        "tahun" : tahun
                    },
                    success(response) {
                        $.each(response.data, function(key, value) {
                            edit_pelatihan.push(value.sub_diklat_id);
                            edit_jml.push(value.jumlah);
                        });
                        // console.log(edit_jml);
                        if (result['datas'] != null) {
                            var jml = pelatihan.length;
                            var status = "";
                            var edit_jmls = [];
                            var z=0;
                            for (i = 0; i < pelatihan.length; i++) {
                              
                                if(in_array(pelatihan[i],edit_pelatihan)!= -1){
                                    edit_jmls.push(edit_jml[z]);
                                    z++;
                                }
                                else {
                                        edit_jmls.push(0);
                                }
                            }
                           //end tail
                        //    <tr><th>Pelatihan</th><th>Jumlah Peserta</th></tr>
                            for (i = 0; i < pelatihan.length; i++) {
                               
                                if(in_array(pelatihan[i],edit_pelatihan)!= -1){

                                    status = "checked";
                                   
                                }
                                else {
                                    status = "";
                                }
                                var li = $('<tr><td><div class=""><input class="form-check-input pelatihan" onclick="handleClick(this,' + i + ')" type="checkbox" '+status+' name="' + nama_pelatihan[i] + '" value="' +pelatihan[i] + '" id="pelatihan' + pelatihan[i] + '"/>' +
                                '<label for="pelatihan' + pelatihan[i] + '"></label></div></td><td><input class="form-control" name="jml[]" value="' +edit_jmls[i] + '" class="jml" id="jml' + i + '" type="text" disabled></td</tr>');
                                li.find('label').text(nama_pelatihan[i]);
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

    function Preview(object){
        if($('#tables-p').find("tr:not(:nth-child(1))")){
            $('#tables-p').find("tr:not(:nth-child(1))").remove();
        }
        if($('#tables-u').find("tr:not(:nth-child(1))")){
            $('#tables-u').find("tr:not(:nth-child(1))").remove();
        }
        $('#modal-preview').modal('show');
        $.ajax({
            url: "{{route('transaksi.preview')}}",
            type: "GET",
            dataType: "json",
            // data: {
            //     "id": id,
            // },
            success(result) {
                 $.each(result.datas, function(key,value) {
                    // console.log(value);
                    var li = $(`<tr>
                                    <td>${value.nama_diklat}</td>
                                    <td>${value.pelatihan}</td>
                                    <td>${value.jumlah}</td>
                                    <td>${value.tahun}</td>
                                <tr>`);
                    $('#tables-p').append(li);
                    
                });
                $.each(result.usulan, function(key,value) {
                    var li = $(`<tr>
                                    <td>${value.usulan}</td>
                                    <td>${value.jumlah}</td>
                                <tr>`);
                    $('#tables-u').append(li);
                    
                });
            },
            error(xhr, status, error) {
                var err = eval('(' + xhr.responseText + ')');
                notification(status, err.message);
                checkCSRFToken(err.message);
            }
        });
        
    }

    function handleClick(cb,val) {
        // console.log("Clicked, new value = ",cb.checked);
        if(cb.checked){
            $('#jml'+val).prop('disabled', false);
            $('#jml'+val).val(1);
        }
        else{
            $('#jml'+val).prop('disabled', true);
            $('#jml'+val).val(0);
        }
        var count = $('input[name="pelatihan"]:checked').length;
        console.log(count)
    }

    function AddData() {
        var form=$("body");
            form.find('.invalid-feedback').remove();
            form.find('.form-group .is-invalid').removeClass('is-invalid');
        var tahun = $("#tahun").val();;
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
                        location.reload()
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
                    iziToast.error({
                        title: 'Error',
                        message: err.message,
                        position: 'topRight'
                    });
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
                location.reload()
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
                    location.reload()
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
                location.reload()
            },
            error(xhr, status, error) {
                var err = eval('(' + xhr.responseText + ')');
            },
        });
    }

    function OpenModalUsulan(){
        $('#modal-usulan').modal('show');
        $('.newRowJumlah').empty();
        
        $.ajax({
            url: "{{ route('transaksi.getUsulan') }}",
            type: "GET",
            dataType: "json",
            success(result) {
                var html = '';      
                var data = result.datas;
                if(data.length>0){
                    $.each(data, function(key,value) {
                        html += '<div class="inputFormRow">'
                        html += `<div class="form-group">
                            <div class='input-group inputRow row'>
                                <div class="form-group col-5">
                                    <label>Usulan</label>
                                    <input type="text" class="form-control m-input" name="usulan[]" placeholder="Usulan" value='${value.usulan}' autocomplete='off'>
                                    <input type="hidden" class="form-control m-input" name="id_usulan[]" placeholder="Usulan" value='${value.id}'>
                                    
                                </div>
                                <div class="form-group col-5">
                                    <label>Jumlah Peserta</label>
                                    <input type="text" class="form-control m-input" name="jumlah[]" placeholder="Jumlah Peserta" value='${value.jumlah}' autocomplete='off'>                                    
                                </div>
                                <div class="form-group col-2">
                                    <label></label>
                                    <div class="input-group-append">
                                        <button style='margin-top:10px' id="removeRow" type="button" class="btn btn-danger"><span class="fa fa-trash"></span>Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        html += '</div>'
                    });
                }else{
                    html += `<div class="row">
                        <div class="form-group col-5">
                            <label>Usulan</label>
                            <input type="text" class="form-control m-input" name="usulan[]" placeholder="Usulan" autocomplete='off'>
                        </div>
                        <div class="form-group col-5">
                            <label>Jumlah Peserta</label>
                            <input type="text" class="form-control m-input" name="jumlah[]" placeholder="Jumlah Peserta" autocomplete='off'>
                        </div>
                        <div class="form-group col-2">
                            <label></label>
                            <div class="input-group-append">
                                <button style='margin-top:10px' id="removeRow" type="button" class="btn btn-danger"><span class="fa fa-trash"></span>Hapus</button>
                            </div>
                        </div>
                    </div>
                    `;
                }
                $('.newRowJumlah').append(html);
            }
        })
    }
    var i = 0;
    $('.addRowJumlah').click(function () {
        i++;
        var html = '';      
        html += '<div class="inputFormRow">'
        html += `<div class="form-group">
                    
                    <div class='input-group inputRow row'>
                        <div class="form-group col-5">
                            <label>Usulan</label>
                            <input type="text" class="form-control m-input" name="usulan[]" placeholder="Usulan" autocomplete='off'>
                        </div>
                        <div class="form-group col-5">
                            <label>Jumlah Peserta</label>
                            <input type="text" class="form-control m-input" name="jumlah[]" placeholder="Jumlah Peserta" autocomplete='off'>
                        </div>
                        <div class="form-group col-2">
                            <label></label>
                            <div class="input-group-append">
                                <button  style='margin-top:10px' id="removeRow" type="button" class="btn btn-danger"><span class="fa fa-trash"></span>Hapus</button>
                            </div>
                        </div>
                    </div>
                </div>
                `;
        html += '</div>'
        if(i == 10 || i>10){
            alert('max usulan 10')
        }else{
            $('.newRowJumlah').append(html);
        }
        
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('.inputRow').closest('.inputFormRow').remove();
    });

    $("#form-usulan").on("submit", function(e) {
        e.preventDefault();
        var form=$("body");
            form.find('.invalid-feedback').remove();
            form.find('.form-group .is-invalid').removeClass('is-invalid');
        $.ajax({
            url: "{{route('usulan')}}",
            type: "POST",
            dataType: "json",
            data: new FormData(this),
            processData: false,
            contentType: false,
            success(result) {
                $("#form-usulan")[0].reset();
                $('#modal-usulan').modal('hide');

                if(result.status=='success'){
                    iziToast.success({
                        title: result.status,
                        message: result.message,
                        position: 'topRight'
                    });
                    location.reload()
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
                iziToast.error({
                    title: 'Error',
                    message: err.errors.usulan,
                    position: 'topRight'
                });
            }
        })
    });

    function ResetUsulan(){
        $.ajax({
            url: "{{ route('usulan') }}",
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
                location.reload()
            },
            error(xhr, status, error) {
                var err = eval('(' + xhr.responseText + ')');
                iziToast.error({
                    title: 'Error',
                    message: err.message,
                    position: 'topRight'
                });
            }
        });
    }
</script>

@endsection
