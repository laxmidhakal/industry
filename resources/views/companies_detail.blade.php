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
<section class="video-section spad" >
  <div class="container">
    <div class="row">
      @foreach($companies_details as $main_data)
      <div class="col-lg-6">
        <div class="video-text">
          <h2>{{$main_data->title}} </h2>
          <p>{!! $main_data->description !!}</p>
          <a href="">Read More</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="video-box set-bg" data-setbg="{{URL::to('/')}}/images/company/{{$main_data->image_enc}}">
          <a href="https://www.youtube.com/watch?v=7IRkdz2LZ6M" class="video-popup">
            <i class="fa fa-play"></i>
          </a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection