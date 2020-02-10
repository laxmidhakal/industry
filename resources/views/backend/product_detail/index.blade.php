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
                    <th>Product</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Label</th>
                    <th>Action</th>
                  </tr>
                </thead>
                @foreach($productdetails as $detail)
                <tr>
                  <td>{{$detail->id}}</td>
                  <td >{{$detail->product->title}}</td>
                  <td>{{$detail->title}}</td>
                  <td>{{$detail->description}}</td>
                  <td>
                    <div class="">
                      <img src="{{URL::to('/')}}/images/{{$page}}/{{$detail->image_enc}}" class="img-fluid back-img">
                      
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
            Footer
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <div class="modal fade" id="modal-default" data-backdrop="static" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detail </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form role="form" method="POST" action="{{route('productdetail.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-body" >
              <div class="form-group">
                <label for="product_id">Select </label>
                <select name="product_id" id="product_id">
                  <option value="">--Select Product</option>
                  @foreach($products as $product)
                  <option value="{{$product->id}}">{{$product->title}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
              </div>
              <div class="form-group">
                <label for="decription">Description</label>
                <input type="text" class="form-control" id="decription" placeholder="Enter title" name="description">
              </div>

              <div class="form-group">
                <label for="image">File input</label>
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