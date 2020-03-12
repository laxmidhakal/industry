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
            <li class="breadcrumb-item active text-capitalize">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card">
      <div class="card-header">
        @if(count($settings)=='0')
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} + </button>
        @elseif(count($settings)<='1')
        @endif
        <div class="card-tools">
          <small class="text-danger mr-4">* image must be of png only</small>
        </div>
      </div>
      <?php $page = substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), ".")); ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="bg-secondary">
              <tr>
                <th style="width: 10px">SN</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <!-- <th>Latitude</th> -->
                <!-- <th>Longitude</th> -->
                <th>Image</th>
                <th style="width: 10px" class="text-center">Label</th>
                <th style="width: 10px" class="text-center">Social</th>
                <th style="width: 90px" class="text-center">Action</th>
              </tr>
            </thead>
            @foreach($settings as $key=>$setting)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$setting->address}}</td>
              <td>{{$setting->phone}}</td>
              <td>{{$setting->email}}</td>
              <!-- <td>{{$setting->lat}}</td> -->
              <!-- <td>{{$setting->long}}</td> -->
              <td>
                <a href="{{URL::to('/')}}/images/setting/{{$setting->image_enc}}" data-toggle="lightbox" data-title="Image">
                  @if($setting->image_enc != "")
                  <img src="{{URL::to('/')}}/images/setting/{{$setting->image_enc}}" class="img-thumbnail img-fluid back-img center-block">
                  @else
                  <img src="{{URL::to('/')}}/img/sas.png" class="img-thumbnail img-fluid back-img">
                  @endif
                </a>
              </td>
              <td>
                <a href="{{URL::to('/')}}/home/setting/isactive/{{$setting->id}}" class="btn {{ $setting->is_active == '1' ? 'btn-success':'btn-danger'}} btn-xs">
                  <i class="fa {{ $setting->is_active == '1' ? 'fa-check':'fa-times'}}"></i>
                </a>
              </td>
              <td>
                <a href="{{URL::to('/')}}/home/social" class="btn btn-xs btn-info">
                  <i class=" nav-icon fas fa-share-square"></i>
                </a>
              </td>
              <td>
                <a href="{{ route('setting.edit',$setting->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                <form action="{{ route('setting.destroy',$setting->id)}}" method="post" class="d-inline-block">
                  {{csrf_field()}}
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-xs btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="card-footer">
     </div>
   </div>
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
              <input type="text" class="form-control" id="address" placeholder="Enter address" autocomplete="off" name="address" required="true">
            </div>
            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" placeholder="Enter phone" autocomplete="off" name="phone" required="true">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" autocomplete="off" name="email" required="true">
            </div>
            <div class="form-group">
              <label for="lat">Latitude</label>
              <input type="text"  class="form-control" id="lat" placeholder="Enter latitude" autocomplete="off" name="lat" >
            </div>
            <div class="form-group">
              <label for="long">Longitude</label>
              <input type="text"  class="form-control" id="long" placeholder="Enter longitude" autocomplete="off" name="long" >
            </div>
            <div class="form-group">
              <label for="image">Choose Logo(Logo must be in png)</label>
              <div class="input-group">
                  <input type="file" class="form-control d-none" id="image" name="image" required="true">
                  <img src="{{URL::to('/')}}/img/thumbnail.png" id="profile-img-tag" width="200px" onclick="document.getElementById('image').click();" alt="your image" class="img-thumbnail img-fluid editback-gallery-img center-block"  />
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
  @endsection
  @section('javascript')
  <script type="text/javascript">
   $(document).on('click', '[data-toggle="lightbox"]', function(event) {
     event.preventDefault();
     $(this).ekkoLightbox();
   });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
  @endsection
 
 
