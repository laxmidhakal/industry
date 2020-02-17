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
      <div class="col-lg-8 order-1 order-lg-2">
      @foreach($companies_details as $main_data)
      <div class="blog-post">
        <div class="blog-thumb set-bg" data-setbg="{{URL::to('/')}}/images/company/{{$main_data->image_enc}}" alt="{{$main_data->title}}">
        </div>
        <h2>{{$main_data->title}} </h2>
        </a>
        <p>{!! $main_data->description !!}</p>
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