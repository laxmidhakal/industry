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
    <div class="card">
      <div class="card-header">
        @if(count($abouts)=='0')
        <button class="btn btn-sm btn-info text-capitalize" data-toggle="modal" data-target="#modal-default">{{ substr((Route::currentRouteName()), 0, strpos((Route::currentRouteName()), "."))}} + </button>
        @elseif(count($abouts)<='1')
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
                    <th>Title</th>
                    <th>Description</th>
                    <th style="width: 10px" class="text-center">Sort</th>
                    <th style="width: 10px" class="text-center">Image</th>
                    <th style="width: 10px" class="text-center">Label</th>
                    <th style="width: 150px" class="text-center" >Created By</th>
                    <th style="width: 150px" class="text-center">Created At</th>
                    <th style="width: 95px" class="text-center">Action</th>
                  </tr>
                </thead>              
                @foreach($abouts as $key=>$about)              
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$about->title}}</td>
                  <td>{!! $about->description !!} </td>
                  <td>
                    <p id="someElement{{$about->id}}" ids="{{$about->id}}" class="text-center sort" contenteditable="plaintext-only" page="about" hidden="true">{{$about->sort_id}}</p>
                  </td>
                  <td>
                    @if($about->image_enc != "")
                    <img src="{{URL::to('/')}}/images/{{$page}}/{{$about->image_enc}}" class="img-fluid back-img center-block">
                    @else
                    <img src="{{URL::to('/')}}/img/sas.png" class="img-fluid back-img">
                    @endif
                  </td>
                  <td>
                    <a href="{{URL::to('/')}}/home/about/isactive/{{$about->id}}" class="btn {{ $about->is_active == '1' ? 'btn-success':'btn-danger'}} btn-xs">
                      <i class="fa {{ $about->is_active == '1' ? 'fa-check':'fa-times'}}"></i>
                    </a>
                  </td>
                  <td class="text-center">{{$about->user->name}}</td>
                  <td class="text-center">{{date('D, j M Y', strtotime($about->created_at))}}</td>
                  <td class="text-center" >
                    <a href="{{ route('about.edit',$about->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
                    <form action="{{ route('about.destroy',$about->id)}}" method="post" class="d-inline-block">
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
          <style type="text/css">
          </style>
          <div class="card-footer">
           {!! $abouts->links("pagination::bootstrap-4") !!}
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
        <form role="form" method="POST" action="{{route('about.store')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-body" >
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text"  class="form-control max" id="title" placeholder="Enter title" name="title" required="true" maxlength="30">
            </div>
            <div class="form-group">
              <label for="decription">Description</label>
              <textarea name="description"  id="description" class="form-control" placeholder="Enter description"></textarea>
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
    </div>
  </div>
  @endsection
  @section('javascript')
  <script type="text/javascript" src="{{URL::to('/')}}/backend/js/bootstrap-maxlength.min.js"></script>
  <script type="text/javascript">
    $('input#title').maxlength({
      alwaysShow: true,
      threshold: 10,
      warningClass: "label label-success",
      limitReachedClass: "label label-danger",
      separator: ' out of ',
      preText: 'Remaininig word ',
      postText: ' chars.',
      validate: true,
      appendToParent:true,
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
          var url= "{{URL::to('/')}}/home/sort/"+page;
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
