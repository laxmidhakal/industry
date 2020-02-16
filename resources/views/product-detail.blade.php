@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')

<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 text-white pt-5">Product</h2>
      </div>
    </div>
  </div>
</section>
<section class="main-about">
  <div class="container">
    <div class="row">
      @foreach($product_details as $about_data)
      <div class="col-lg-6">
        <img src="{{URL::to('/')}}/images/productdetail/{{$about_data->image_enc}}" alt="{{$about_data->title}}" class="img-fluid w-100 main-productdetail-img pb-5 ">
      </div>
      <div class="col-lg-6">
        <div class="about-text">
          <h2>{{$about_data->title}}</h2>
          <p>{!! $about_data->description !!} </p>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</section>
<section class="features-section spad set-bg" data-setbg="{{URL::to('/')}}img/features-bg.jpg" style="background-image: url(&quot;img/features-bg.jpg&quot;);">
    <div class="container">
      <h1 class="display-4 text-center pb-4 text-capitalize">Other related products</h1>
        @if(count($products))
      <div class="row">
          @foreach($products->random(2) as $product)
        <div class="col-lg-4 col-md-6">
          <div class="feature-box">
            <img src="{{URL::to('/')}}/images/productdetail/{{$product->image_enc}}" alt="" class="img-fluid w-100 main-productdetail-img">
            <div class="fb-text">
              <h5>{{$product->title}}</h5>
              <p>{!!$product->description!!} </p>
            </div>
          </div>
          
        </div>
        @endforeach
      </div>
        @endif

    </div>
  </section>




@endsection