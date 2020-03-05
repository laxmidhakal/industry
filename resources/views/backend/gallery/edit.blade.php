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
          @foreach($galleries as $gallery)
          <form role="form" method="POST" action="{{ route('gallery.update',$gallery->id)}}" enctype="multipart/form-data">
           {{csrf_field()}}
           <input name="_method" type="hidden" value="PATCH">
           <div class="modal-body" >
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" autocomplete="off" id="title" placeholder="Enter title" name="title"  value="{{ $gallery->title }}">
            </div>
            <div class="form-group">
              <label for="decription">Description</label>
              <textarea name="description" id="description" class="form-control"  placeholder="Enter description" >{{ $gallery->description}} </textarea>
            </div>
            <div class="form-group">
              <label for="image">Choose Image</label>
              <input type="hidden" value="{{$gallery->image}}">
              <div class="input-group">
                <input type="file" class="form-control" id="image" name="image"  value="{{$gallery->image}}" >
                <img src="{{URL::to('/')}}/images/{{$page}}/{{$gallery->image_enc}}" class="img-fluid editback-gallery-img center-block">

              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
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