@extends('layouts.app')

@section('title')
    Plan Activity
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Management</a></li>
    <li class="breadcrumb-item active">Wilayah</li>
@endsection
@section('style')

    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

@endsection
@section('content')

<div class="row">
    <div class="col-md-6">
        <button type="button" id="data-test" class="btn btn-primary mb-3" data-toggle="modal" data-target="#areaModal">
            Tambah Area
        </button>
        <div class="card">
            <div class="card-body table-responsive p-3" >
                <table class="table table-head-fixed text-nowrap" id="data-area">
                    <thead>
                      <tr>
                        <th>Area</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <button type="button" id="data-test" class="btn btn-primary mb-3" data-toggle="modal" data-target="#wilayahModal">
            Tambah Wilayah
        </button>
        <div class="card">
            <div class="card-body table-responsive p-3" >
                <table class="table table-head-fixed text-nowrap" id="data-wilayah">
                    <thead>
                      <tr>
                        <th>Area</th>
                        <th>Wilayah</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="button" id="data-test" class="btn btn-primary mb-3" data-toggle="modal" data-target="#wismaModal">
            Tambah Wisma
        </button>
        <div class="card">
            <div class="card-body table-responsive p-3">
                <table class="table table-head-fixed text-nowrap" id="data-wisma">
                    <thead>
                      <tr>
                        <th>Area</th>
                        <th>Wilayah</th>
                        <th>Wisma</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('management.wilayah.area')
@include('management.wilayah.wilayah')
@include('management.wilayah.wisma')
@endsection


@section('script')

<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>

    var table_area = $('#data-area').DataTable({
        "processing" : true,
        "serverside" : true,
        "ajax" : {
            "url" : "{{route('management.wilayah.area.data')}}",
            "type" : "GET",
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        }
    })

    var table_wilayah = $('#data-wilayah').DataTable({
        "processing" : true,
        "serverside" : true,
        "ajax" : {
            "url" : "{{route('management.wilayah.wilayah.data')}}",
            "type" : "GET",
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        }
    })

    var table_wisma = $('#data-wisma').DataTable({
        "processing" : true,
        "serverside" : true,
        "ajax" : {
            "url" : "{{route('management.wilayah.wisma.data')}}",
            "type" : "GET",
            "headers": {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
        }
    })



   $('#submit-area').on('click',function(){
    if($('#area').val() == '' || $('#area').val() == null){
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Area tidak boleh kosong",
          showConfirmButton: false,
          timer: 1500
        });

        return;

    }

     $.ajax({
        url: "{{ route('management.wilayah.area.create') }}",
        dataType: "JSON",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        data:$('#create-area').serialize(),
        success: function(data){
            if(data.status){
                table_area.ajax.reload();
                $('#areaModal').modal('hide')
                $('#area').val('');
                Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
                });
            }
        },
        error: function(data){
        var message = data.responseJSON.message
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  width: 400,
                  height:500,
                  title: message,
                  showConfirmButton: false,
                  timer: 1500
                });        }

     })
   })

   $('#submit-wilayah').on('click',function(){
    if($('#wilayah').val() == '' || $('#wilayah').val() == null){
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Wilayah tidak boleh kosong",
          showConfirmButton: false,
          timer: 1500
        });

        return;
    }

    if($('#areaId').val() == '' || $('#areaId').val() == null){
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Area harus di pilih",
          showConfirmButton: false,
          timer: 1500
        });

        return;

    }

     $.ajax({
        url: "{{ route('management.wilayah.wilayah.create') }}",
        dataType: "JSON",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        data:$('#create-wilayah').serialize(),
        success: function(data){
            if(data.status){
                table_area.ajax.reload();
                table_wilayah.ajax.reload();
                $('#wilayahModal').modal('hide')
                $('#areaId').val('').trigger('change');
                $('#wilayah').val('');
                Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
                });
            }
        },
        error: function(data){
        var message = data.responseJSON.message
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  width: 400,
                  height:500,
                  title: message,
                  showConfirmButton: false,
                  timer: 1500
                });        }

     })
   })


   $('#submit-wisma').on('click',function(){
    if($('#wisma').val() == '' || $('#wisma').val() == null){
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Wisma tidak boleh kosong",
          showConfirmButton: false,
          timer: 1500
        });

        return;
    }

    if($('#wilayahId').val() == '' || $('#wilayahId').val() == null){
        Swal.fire({
          position: "top-end",
          icon: "error",
          title: "Wilayah harus di pilih",
          showConfirmButton: false,
          timer: 1500
        });

        return;

    }

     $.ajax({
        url: "{{ route('management.wilayah.wisma.create') }}",
        dataType: "JSON",
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        data:$('#create-wisma').serialize(),
        success: function(data){
            if(data.status){
                table_area.ajax.reload();
                table_wilayah.ajax.reload();
                table_wisma.ajax.reload();
                $('#wismaModal').modal('hide')
                $('#wilayahId').val('').trigger('change');
                $('#wisma').val('');
                Swal.fire({
                  position: "top-end",
                  icon: "success",
                  title: data.message,
                  showConfirmButton: false,
                  timer: 1500
                });
            }
        },
        error: function(data){
        var message = data.responseJSON.message
                Swal.fire({
                  position: "top-end",
                  icon: "error",
                  width: 400,
                  height:500,
                  title: message,
                  showConfirmButton: false,
                  timer: 1500
                });        }

     })
   })

</script>
@endsection
