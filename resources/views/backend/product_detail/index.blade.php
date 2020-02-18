@extends('backend.app')

@section('content')
<div class="content-wrapper">

  @include('backend.flash.alertmsg')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="text-capitalize">product Detail Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active text-capitalize">product Detail Page</li>
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

        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">product Detail + </button>

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
                    <th>Product</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($productdetails as $key=>$detail)
                <tr>
                  <td>{{$key+1}}</td>
                  <td >{{$detail->getProduct->title}}</td>
                  <td>{{$detail->title}}</td>
                  <td>{!! $detail->description !!}</td>
                  <td>
                    @if($detail->image_enc != "")
                      <img src="{{URL::to('/')}}/images/productdetail/{{$detail->image_enc}}" class="img-fluid back-img center-block">
                    @else
                      <img src="{{URL::to('/')}}/img/sas.png" class="img-fluid back-img">
                    @endif
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
             {!! $productdetails->links("pagination::bootstrap-4") !!}
            
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
            <h4 class="modal-title text-capitalize">{{$page}} Add</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form role="form" method="POST" action="{{URL::to('/')}}/home/product/detail/store" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="product_id" value="{{$product_id}}">
            <div class="modal-body" >
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" required="true">
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