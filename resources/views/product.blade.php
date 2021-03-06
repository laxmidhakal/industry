@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 text-white pt-5">Products</h2>
      </div>
    </div>
  </div>
</section>
<section class="features-section spad set-bg" data-setbg="{{URL::to('/')}}img/features-bg.jpg" style="background-image: url(&quot;img/features-bg.jpg&quot;);">
  <div class="container">
    <div class="row">
      @foreach($product_details as $main_data)
      <div class="col-lg-4 col-md-6">
        <a href="{{URL::to('/')}}/product/{{$main_data->getProduct->slug}}/{{$main_data->slug}}">
          <div class="feature-box">
            <img src="{{URL::to('/')}}/images/productdetail/{{$main_data->image_enc}}" alt="{{$main_data->title}}" class="img-fluid w-100 product-img">
            <div class="fb-text">
              <h5>{{$main_data->title}}</h5>
              <p> {!! str_limit($main_data->description, 35)!!}</p>
            </div>
          </a>
        </div>
    </div>
      @endforeach
    </div>
    <div class="mt-4 d-flex justify-content-center">
      {!! $product_details->links("pagination::bootstrap-4") !!}
    </div>
  </div>
  </section>
@endsection
