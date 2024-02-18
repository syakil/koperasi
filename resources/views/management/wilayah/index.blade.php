@extends('layouts.app')

@section('title')
    Plan Activity
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item">Management</a></li>
    <li class="breadcrumb-item active">Wilayah</li>
@endsection
@section('content')

<div class="row">

<div class="col-md-6">
    <button type="button" id="data-test" class="btn btn-primary mb-3" data-toggle="modal" data-target="#areaModal">
        Tambah Area
    </button>
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body table-responsive p-0" >
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Area</th>
              <th>Wilayah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>John Doe</td>
              <td>John Doe</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
<div class="col-md-6">
    <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-default">
        Add Activity
    </button>
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" >
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Wilayah</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>John Doe</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
<div class="row">
    <div class="col-sm-3 mb-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
            Add Activity
        </button>
    </div>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="card-tools">
          <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

            <div class="input-group-append">
              <button type="submit" class="btn btn-default">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" >
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Area</th>
              <th>Wilayah</th>
              <th>Wisma</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>John Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-success">Approved</span></td>
              <td>Bacon</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>
@endsection

@include('management.wilayah.area')

@section('script')
<script>
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

</script>
@endsection
