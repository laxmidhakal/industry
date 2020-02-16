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
                    <th>SN</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($settings as $key=>$setting)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$setting->address}}</td>
                  <td>{{$setting->phone}}</td>
                  <td>{{$setting->email}}</td>
                  <td>{{$setting->lat}}</td>
                  <td>{{$setting->long}}</td>
                  <td>
                    <div class="">
                      <img src="{{URL::to('/')}}/images/{{$page}}/{{$setting->image_enc}}" class="img-fluid back-img">
                      
                    </div>
                  </td>
                  <td>
                    <a href="" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a>
                  </td>
                  <td>
                    <a href="" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                    <a href="" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
             {!! $settings->links("pagination::bootstrap-4") !!}
            
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
          <form role="form" method="POST" action="{{route('setting.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body" >
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="number" class="form-control" id="phone" placeholder="Enter phone" name="phone">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
              </div>
              <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="number" step="any" class="form-control" id="lat" placeholder="Enter latitude" name="lat">
              </div>
              <div class="form-group">
                <label for="long">Longitude</label>
                <input type="number" step="any" class="form-control" id="long" placeholder="Enter longitude" name="long">
              </div>
              <div class="form-group">
                <label for="image">Choose Image</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="image" name="image">
                </div>
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