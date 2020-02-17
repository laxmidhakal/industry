@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/3.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="display-4 text-white pt-5">Our Companies</h2>
      </div>
    </div>
  </div>
</section>
<section class="blog-section spadpadding">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 sidebar order-2 order-lg-1">
        @if(count($product_details))
        <div class="sb-widget">
          <h2 class="sb-title">Product</h2>
          @foreach($product_details->random(1) as $main_product)
          <div class="recent-post">
            <div class="rp-item">
              <a href="{{URL::to('/')}}/product/{{$main_product->getProduct->slug}}/{{$main_product->slug}}">
                <img src="{{URL::to('/')}}/images/productdetail/{{$main_product->image_enc}}" alt="{{$main_product->title}}" class="img-fluids main-side-product-img">
                <div class="rp-text">
                  <h5>{{$main_product->title}}</h5>
                  <p>{{$main_product->getProduct->title}}</p>
              </a>
              </div>
            </div>    
          </div>
          @endforeach
        </div>
        @endif
        <div class="sb-widget">
          <div class="info-box">
            <h3>Contact Us for Help</h3>
              @foreach($about_details as $main_about)
             <p> {!! Illuminate\Support\Str::limit($main_about->description, 200) !!}</p>
              @endforeach
            <div class="footer-info-box">
              <div class="fib-icon">
                <img src="{{URL::to('/')}}/img/icons/phone.png" alt="GLOBAL SAS">
              </div>
              @foreach($settings as $setting)
              <div class="fib-text">
                <p>(+977) {{$setting->phone}}<br>{{$setting->email}}</p>
              </div>
              @endforeach
            </div>
            <a href="{{URL::to('/contact')}}">Send us a message</a>
          </div> 
        </div>
      </div>
      <div class="col-lg-8 order-1 order-lg-2">
      @foreach($companies_details as $main_data)
      <div class="blog-post">
        <div class="blog-thumb set-bg" data-setbg="{{URL::to('/')}}/images/company/{{$main_data->image_enc}}" alt="{{$main_data->title}}"  >
        </div>
        <h2>{{$main_data->title}} </h2>
        <p>{!! $main_data->description !!}</p>
        <button class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-outline" ><a href=" {{URL::to('/')}}/companies/{{$main_data->slug}}">Read More</a></button>
      </div> 
      @endforeach
      <div class="mt-4">
        {!! $companies_details->links("pagination::bootstrap-4") !!}
      </div>
      </div>
    </div>
  </div>
</section>
@endsection