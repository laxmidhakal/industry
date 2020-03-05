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
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} + </button>
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
                <th>Description</th>
                <th style="width: 10px" class="text-center">Sort</th>
                <th style="width: 10px" class="text-center">Image</th>
                <th style="width: 10px" class="text-center">Label</th>
                <th style="width: 90px" class="text-center">Action</th>
              </tr>
            </thead>
            @foreach($companies as  $key=>$company)
            <tr>
              <td>{{$key+1}}</td>
              <td>
                <a href="{{URL::to('/')}}/home/company/{{$company->slug}}/detail">
                  {{$company->title}}
                </a>
              </td>
              <td>{!! $company->description !!} </td>
              <td>
                <p id="someElement{{$company->id}}" ids="{{$company->id}}" class="text-center sort" contenteditable="plaintext-only" page="company">{{$company->sort_id}}</p>
              </td>
              <td>
               @if($company->image_enc != "")
               <img src="{{URL::to('/')}}/images/{{$page}}/{{$company->image_enc}}" class="img-fluid back-img center-block">
               @else
               <img src="{{URL::to('/')}}/img/sas.png" class="img-fluid back-img">
               @endif
             </td>
             <td>
              <a href="{{URL::to('/')}}/home/company/isactive/{{$company->id}}" class="btn {{ $company->is_active == '1' ? 'btn-success':'btn-danger'}} btn-xs">
                <i class="fa {{ $company->is_active == '1' ? 'fa-check':'fa-times'}}"></i>
              </a>
            </td>
            <td>
              <a href="{{ route('company.edit',$company->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
              <form action="{{ route('company.destroy',$company->id)}}" method="post" class="d-inline-block">
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
    <!-- /.card-body -->
    <div class="card-footer">
     {!! $companies->links("pagination::bootstrap-4") !!}            
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
      <form role="form" method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-body" >
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" autocomplete="off" required="true">
          </div>
          <div class="form-group">
            <label for="decription">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="Enter description" ></textarea>
          </div>
          <div class="form-group">
            <label for="image">Choose Image</label>
            <div class="input-group">
              <input type="file" class="form-control" id="image" name="image" required="true">
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

