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
        @if(count($socials)=='0')
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} + </button>
        @elseif(count($socials)<='1')
        @endif
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
                  <td contenteditable="true">{{$social->facebook}}</td>
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
          <div class="card-footer">
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
                <input type="text" class="form-control" id="facebook" placeholder="https://www.facebook.com/" name="facebook">
              </div>
              <div class="form-group">
                <label for="linkedin">Linkedin</label>
                <input type="text" class="form-control" id="linkedin" placeholder="https://www.linkedin.com/" name="linkedin">
              </div>
              <div class="form-group">
                <label for="twitter">Twitter</label>
                <input type="text" class="form-control" id="twitter" placeholder="https://twitter.com/" name="twitter">
              </div>
              <div class="form-group">
                <label for="google">GooglePlus</label>
                <input type="text" class="form-control" id="google" placeholder="https://googleplus.com/" name="google">
              </div>
              <div class="form-group">
                <label for="instagram">Instagram</label>
                <input type="text" class="form-control" id="instagram" placeholder="https://www.instagram.com/" name="instagram">
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
  