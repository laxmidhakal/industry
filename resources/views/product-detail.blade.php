@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')

<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 text-white text-padding">Product</h2>
      </div>
    </div>
  </div>
</section>
<section class="features-section spad set-bg" data-setbg="{{URL::to('/')}}img/features-bg.jpg" style="background-image: url(&quot;img/features-bg.jpg&quot;);">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="feature-box">
              @foreach($product_description as $main_data)
            <img src="{{URL::to('/')}}/images/productdetail/{{$main_data->image_enc}}" alt="">
            <div class="fb-text">
              <h5>{{$main_data->title}}</h5>
              <p>{!!$main_data->description!!} </p>
              <a href="{{ route('productDescription') }}" class="fb-more-btn"> Hello Read More</a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection