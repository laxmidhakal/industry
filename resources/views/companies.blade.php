@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')

<section class="main-page-top set-bg" data-setbg="img/page-top-bg/3.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="display-4 text-white text-padding">Companies</h2>
       
      </div>
    </div>
  </div>
</section>
<section class="blog-section spadpadding">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 sidebar order-2 order-lg-1">
        
        
        <div class="sb-widget">
          <h2 class="sb-title">Product</h2>
          <div class="recent-post">
            <div class="rp-item">
              <img src="img/blog/recent-post/1.jpg" alt="">
              <div class="rp-text">
                <p>All you need to know about Product</p>
                 <button class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-out">Read More</button>
              </div>
            </div>
            <div class="rp-item">
              <img src="img/blog/recent-post/2.jpg" alt="">
              <div class="rp-text">
                <p>All you need to know about Product</p>
                 <button class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-out">Read More</button>
              </div>
            </div>
            <div class="rp-item">
              <img src="img/blog/recent-post/3.jpg" alt="">
              <div class="rp-text">
                <p>All you need to know about Product</p>
                 <button class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-out">Read More</button>
              </div>
            </div>
          </div>
        </div>
        <div class="sb-widget">
          <div class="info-box">
            <h3>Contact Us for Help</h3>
            <p>Innovation and simplicity makes us happy: our goal is to remove any technical or financial barriers that can prevent business owners from making their own website. </p>
            <div class="footer-info-box">
              <div class="fib-icon">
                <img src="img/icons/phone.png" alt="" class="">
              </div>
              <div class="fib-text">
                <p>(+977) 01-5901288<br>contact@yourdomain.com</p>
              </div>
            </div>
            <a href="#">Send us a message</a>
          </div>
          
        </div>
      </div>
      <div class="col-lg-8 order-1 order-lg-2">
      @foreach($companies_details as $main_data)
        <div class="blog-post">
          <div class="blog-thumb set-bg" data-setbg="{{URL::to('/')}}/images/company/{{$main_data->image_enc}}">
          </div>
          <h2>{{$main_data->title}} </h2>
          <p>{!! $main_data->description !!}</p>
        </div>
        
      @endforeach
      </div>
    </div>
  </div>
</section>

@endsection