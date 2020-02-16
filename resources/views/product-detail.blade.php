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
<section class="testimonial-section features-section spad set-bg">
  <div class="container-fluid">
    <div class="row">
     @foreach($product_details as $main_data)
      <div class="col-lg-6 p-0">
        <div class="testimonial-bg set-bg" data-setbg="{{URL::to('/')}}/images/productdetail/{{$main_data->image_enc}}"></div>
      </div>
      <div class="col-lg-6 p-0">
        <div class="testimonial-box">
          <div class="testi-box-warp">
            <h2>{{$main_data->title}}</h2>
            <div class="testimonial-slider owl-carousel">
              <div class="testimonial">
                <p>{!!$main_data->description!!}</p>
                <img src="{{URL::to('/')}}" alt="">
                <div class="testi-info">
                  <h5></h5>
                  <span>CEO Industrial INC</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   @endforeach
  </div>
</section>

@endsection