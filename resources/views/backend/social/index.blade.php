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
    <!-- Default box -->
    <div class="card">
      @if(count($socials) == '0')
      <div class="card-header">
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} + </button>
        <div class="card-tools">
        </div>
      </div>
      @endif
      <?php $page = substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), ".")); ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="bg-secondary">
              <tr>
                <th style="width: 10px">SN</th>
                <th>Facebook</th>
                <th>Linkedin</th>
                <th>Twitter</th>
                <th>Google</th>
                <th>Instagram</th>
                <th style="width: 10px" class="text-center">Label</th>
                <th style="width: 90px" class="text-center">Action</th>
              </tr>
            </thead>
            @foreach($socials as $key=>$social)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$social->facebook}}</td>
              <td>{{$social->linkedin}}</td>
              <td>{{$social->twitter}}</td>
              <td>{{$social->google}}</td>
              <td>{{$social->instagram}}</td>
              <td>
                <a href="{{URL::to('/')}}/home/social/isactive/{{$social->id}}" class="btn {{ $social->is_active == '1' ? 'btn-success':'btn-danger'}} btn-xs">
                  <i class="fa {{ $social->is_active == '1' ? 'fa-check':'fa-times'}}"></i>
                </a>
              </td>
              <td >
                <a href="{{ route('social.edit',$social->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                <form action="{{ route('social.destroy',$social->id)}}" method="post" class="d-inline-block">
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
    </div>
  </section>
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
      <form role="form" method="POST" action="{{route('social.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body" >
          <div class="form-group">
            <label for="facebook">Facebook</label>
            <input type="text" class="form-control" id="facebook" placeholder="https://www.facebook.com/" autocomplete="off" name="facebook">
          </div>
          <div class="form-group">
            <label for="linkedin">Linkedin</label>
            <input type="text" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/" autocomplete="off" name="linkedin">
          </div>
          <div class="form-group">
            <label for="twitter">Twitter</label>
            <input type="text" class="form-control" id="twitter" placeholder="https://twitter.com/" autocomplete="off" name="twitter">
          </div>
          <div class="form-group">
            <label for="google">GooglePlus</label>
            <input type="text" class="form-control" id="google" placeholder="https://googleplus.com/" autocomplete="off" name="google">
          </div>
          <div class="form-group">
            <label for="instagram">Instagram</label>
            <input type="text" class="form-control" id="instagram" placeholder="https://www.instagram.com/" autocomplete="off" name="instagram">
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
  