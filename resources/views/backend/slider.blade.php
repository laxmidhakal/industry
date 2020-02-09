@extends('backend.main')

@section('content')
@include('backend.sidebar')
<div class="row">
  <div class="col-lg-6 col-6">
    <div class="container">

       

        <div class="panel panel-primary">

          <div class="panel-heading"><h2>Image upload</h2></div>

          <div class="panel-body">

       

            @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

                <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

            </div>

            <img src="images/{{ Session::get('image') }}">

            @endif

      

            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Whoops!</strong> There were some problems with your input.

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

      

            

      

          </div>

        </div>

    </div>
    <!-- small box -->
    <form role="form" method="POST" action="{{URL::to('/')}}/home/dashboard/slider" enctype="multipart/form-data">
      {{csrf_field()}}
      <!-- <input type="" name="_token" value="{{csrf_token()}}"> -->
      <div class="card-body">
        <div class="form-group">
          
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter category name">
        </div>
        <div class="form-group">
          
          <label for="name">Image</label>
          <input type="file" name="image"  id="image"  placeholder="Choose image">

        </div>
        <div class="form-group">
          <label for="description">description</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Enter sale price">
        </div>
        
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- ./col -->
  
</div>
@endsection
