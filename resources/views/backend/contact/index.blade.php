@extends('backend.app')
@section('content')
<div class="content-wrapper">
  @include('backend.flash.alertmsg')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Contact Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Contact Page</li>
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
        <div class="card-tools">
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
                <a href="{{URL::to('/')}}/home/contact/{{$contact->id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
   