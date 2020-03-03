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
            <li class="breadcrumb-item"><a href="{{URL::to('/')}}/home">Home</a></li>
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
        </div>
      </div>
      <?php $page = substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), ".")); ?>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="bg-secondary">
              <tr>
                <th style="width: 10px" >SN</th>
                <th>Product</th>
                <th>Title</th>
                <th>Description</th>
                <th style="width: 10px" class="text-center">Sort</th>
                <th style="width: 10px" class="text-center">Image</th>
                <th style="width: 10px" class="text-center">Label</th>
                <th style="width: 90px" class="text-center">Action</th>
              </tr>
            </thead>
            @foreach($productdetails as $key=>$detail)
            <tr>
              <td>{{$key+1}}</td>
              <td >{{$detail->getProduct->title}}</td>
              <td>{{$detail->title}}</td>
              <td>{!! $detail->description !!}</td>
              <td>
                <p id="someElement{{$detail->id}}" ids="{{$detail->id}}" class="text-center sort" contenteditable="plaintext-only" page="detail" >{{$detail->sort_id}}</p>
              </td>
              <td>
                @if($detail->image_enc != "")
                <img src="{{URL::to('/')}}/images/productdetail/{{$detail->image_enc}}" class="img-fluid back-img center-block">
                @else
                <img src="{{URL::to('/')}}/img/sas.png" class="img-fluid back-img">
                @endif
              </td>
              <td>
                <a href="{{URL::to('/')}}/home/productdetail/isactive/{{$detail->id}}" class="btn {{ $detail->is_active == '1' ? 'btn-success':'btn-danger'}} btn-xs">
                  <i class="fa {{ $detail->is_active == '1' ? 'fa-check':'fa-times'}}"></i>
                </a>
              </td>
              <td>
                <a href="{{URL::to('/')}}/home/product/detail/{{$detail->id}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                <a href="{{URL::to('/')}}/home/product/detail/{{$detail->id}}/delete" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
              <input type="text" class="form-control" id="title" placeholder="Enter title" name="title"  required="true" >
            </div>
            <div class="form-group">
              <label for="decription">Description</label>
              <textarea name="description" id="description" class="form-control" placeholder="Enter description"  ></textarea>
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
@section('javascript')
<script type="text/javascript" src="{{URL::to('/')}}/backend/js/bootstrap-maxlength.min.js"></script>
<script type="text/javascript">
 $('textarea#message_area').on('keyup',function() 
 {
   var maxlen = $(this).attr('maxlength');
   var length = $(this).val().length;
   if(length > (maxlen-10) ){
     $('#textarea_message').text('max length '+maxlen+' characters only!')
   }
   else
     {
       $('#textarea_message').text('');
     }
 });
</script>
<script type="text/javascript">
    $(".sort").keydown(function (e) {
      Pace.start();
      if (e.which == 9){
        var id = $(event.target).attr('ids'),
            page = $(event.target).attr('page'),
            token = $('meta[name="csrf-token"]').attr('content'),
            value = document.getElementById('someElement'+id).innerHTML; //value of the text input
        var url= "{{URL::to('/')}}/home/sort/product/"+page;
      debugger;
        $.ajax({
          type:"POST",
          dataType:"JSON",
          url:url,
          data:{
            _token:token,
            id : id,
            value:value,
          },
          success:function(e){
            location.reload();
          },
          error: function (e) {
            alert('Sorry! this data is used some where');
            Pace.start();
          }
        });
      }
    });
  </script>
@endsection