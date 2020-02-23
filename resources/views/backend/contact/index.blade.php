@extends('backend.app')
@section('content')
<div class="content-wrapper">
  @include('backend.flash.alertmsg')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} + </button>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
            </div>
          </div>
          <?php $page = substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), ".")); ?>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead class="bg-secondary">
                  <tr>
                    <th style="width: 10px" >SN</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th style="width: 10px" class="text-center">Label</th>
                    <th style="width: 90px" class="text-center">Action</th>
                  </tr>
                </thead>
                @foreach($contacts as $key=>$contact)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$contact->name}}</td>
                  <td>{{$contact->email}}</td>
                  <td>{{$contact->subject}}</td>
                  <td>{{$contact->message}}</td>
                  <td>
                    <a href="" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                  </td>
                  <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                    
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">    
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
@endsection
   