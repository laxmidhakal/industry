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
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}/home">Home</a></li>
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
          @foreach($socials as $social)
          <form role="form" method="POST" action="{{ route('social.update',$social->id)}}" enctype="multipart/form-data">
           {{csrf_field()}}
           <input name="_method" type="hidden" value="PATCH">
           <div class="modal-body" >
            <div class="form-group">
              <label for="facebook">Facebook</label>
              <input type="text" class="form-control" id="facebook" placeholder="https://www.facebook.com/" name="facebook" value="{{$social->facebook}}">
            </div>
            <div class="form-group">
              <label for="linkedin">Linkedin</label>
              <input type="text" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/" name="linkedin" value="{{$social->linkedin}}">
            </div>
            <div class="form-group">
              <label for="twitter">Twitter</label>
              <input type="text" class="form-control" id="twitter" placeholder="https://twitter.com/" name="twitter" value="{{$social->twitter}}">
            </div>
            <div class="form-group">
              <label for="google">GooglePlus</label>
              <input type="text" class="form-control" id="google" placeholder="https://googleplus.com/" name="google value="{{$social->google}}"">
            </div>
            <div class="form-group">
              <label for="instagram">Instagram</label>
              <input type="text" class="form-control" id="instagram" placeholder="https://www.instagram.com/" name="instagram" value="{{$social->instagram}}">
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