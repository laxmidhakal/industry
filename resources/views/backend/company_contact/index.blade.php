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
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}/home">Home</a></li>
            <li class="breadcrumb-item active text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}}  Company Detail Page</li>
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
        @if(count($companydetails)=='0')
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Add+ </button>
        @elseif(count($companydetails)<='1')
        @endif
        <div class="card-tools">
        </div>
      </div>
      <?php $page = substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), ".")); ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="bg-secondary">
              <tr>
                <th style="width: 10px">SN</th>
                <th>Title</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Video</th>
                <th>Sort</th>
                <th style="width: 10px" class="text-center">Label</th>
                <th style="width: 90px" class="text-center">Action</th>
              </tr>
            </thead>
            @foreach($companydetails as $key=>$detail)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$detail->getCompany->title}}</td>
              <td>{{$detail->address}}</td>
              <td>{{$detail->phone}}</td>
              <td>{{$detail->email}}</td>
              <td>{{$detail->video}}</td>
              <td>
                <p id="someElement{{$detail->id}}" ids="{{$detail->id}}" class="text-center sort" contenteditable="plaintext-only" page="company/detail" >{{$detail->sort_id}}</p>
              </td>
              <td>
                <a href="{{URL::to('/')}}/home/companydetail/isactive/{{$detail->id}}" class="btn {{ $detail->is_active == '1' ? 'btn-success':'btn-danger'}} btn-xs">
                  <i class="fa {{ $detail->is_active == '1' ? 'fa-check':'fa-times'}}"></i>
                </a>
              </td>
              <td>
                <a href="{{URL::to('/')}}/home/company/detail/{{$detail->id}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                <a href="{{URL::to('/')}}/home/company/detail/{{$detail->id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
<div class="modal fade" id="modal-default" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-capitalize">{{$page}} Add </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="POST" action="{{URL::to('/')}}/home/company/detail/store" enctype="multipart/form-data">
        <input type="hidden" name="company_id" value="{{$company_id}}">
        {{ csrf_field() }}
        <div class="modal-body" >
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required="true" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" required="true" autocomplete="off">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off" name="email" required="true">
          </div>
          <div class="form-group">
            <label for="video">Video</label>
            <input type="text" class="form-control" id="video" autocomplete="off" placeholder="Enter link of video" name="video" required="true">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
@endsection
