@extends('layouts.app')

@section('title')
    Plan Activity
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('planActivity') }}">Plan</a></li>
    <li class="breadcrumb-item active">Activity</li>
@endsection
@section('content')
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
              <th>ID</th>
              <th>User</th>
              <th>Date</th>
              <th>Status</th>
              <th>Reason</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>183</td>
              <td>John Doe</td>
              <td>11-7-2014</td>
              <td><span class="tag tag-success">Approved</span></td>
              <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
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
