@extends('backend.app')
@section('content')
<div class="content-wrapper">
  @include('backend.flash.alertmsg')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Update</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Update</li>
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
          @foreach($settings as $setting)
          <form role="form" method="POST" action="{{ route('setting.update',$setting->id)}}" enctype="multipart/form-data">
           {{csrf_field()}}
           <input name="_method" type="hidden" value="PATCH">
           <div class="modal-body" >
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" required="true" value="{{ $setting->address }}">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone" name="phone" required="true" value="{{ $setting->phone }}">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required="true" value="{{ $setting->email }}">
            </div>
            <div class="form-group">
              <label for="lat">Latitude</label>
              <input type="text"  class="form-control" id="lat" placeholder="Enter latitude" name="lat" value="{{ $setting->lat }}">
            </div>
            <div class="form-group">
              <label for="long">Longitude</label>
              <input type="text"  class="form-control" id="long" placeholder="Enter longitude" name="long" value="{{ $setting->long }}">
            </div>
            <div class="form-group">
              <label for="image">Choose Image</label>
              <input type="hidden" value="{{$setting->image}}">
              <div class="input-group">
                <input type="file" class="form-control" id="image" name="image"  value="{{$setting->image}}" >
                <img src="{{URL::to('/')}}/images/{{$page}}/{{$setting->image_enc}}" class="img-fluid editback-img">
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        @endforeach
      </div>
    </div>
    <style type="text/css">
    </style>
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