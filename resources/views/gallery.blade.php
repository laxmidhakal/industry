@extends('main')
@section('tab_title') {{$page_title}} @endsection
@section('style')
  <link type="text/css" rel="stylesheet" href="css/lightgallery.css" />
@endsection
@section('content')

<section class="main-page-top set-bg" data-setbg="img/page-top-bg/3.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2  class="display-4 text-white text-padding">{{$page_title}}</h2>
      </div>
    </div>
  </div>
</section>

<section class="elements-section spad">
  <div class="container">
    <div class="demo-gallery">
      <ul id="lightgallery" class="list-unstyled row">
        @foreach($gallery_details as $main_data)
        <li class="col-xs-6 col-sm-4 col-md-3" data-responsive="{{URL::to('/')}}/images/gallery/{{$main_data->image_enc}}" data-src="{{URL::to('/')}}/images/gallery/{{$main_data->image_enc}}" data-sub-html="{{$main_data->title}} <p>{!! strip_tags($main_data->description) !!}</p>" >
          <a href="{{URL::to('/')}}/images/gallery/{{$main_data->image_enc}}">
            <img src="{{URL::to('/')}}/images/gallery/{{$main_data->image_enc}}" alt="{{$main_data->title}}">
          </a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</section>
@endsection

@section('javascript')
<script src="{{URL::to('/')}}/js/lightgallery.min.js"></script>

<!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

<!-- lightgallery plugins -->
<script src="{{URL::to('/')}}/js/lg-thumbnail.min.js"></script>
<script src="{{URL::to('/')}}/js/lg-fullscreen.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#lightgallery').lightGallery();
  });
</script>
<script src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>
<script src="{{URL::to('/')}}/js/lightgallery-all.min.js"></script>
@endsection