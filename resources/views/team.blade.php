@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')

<section class="main-page-top set-bg" data-setbg="img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 text-white text-padding"> Team</h2>
       
       
      </div>
    </div>
  </div>
</section>


<section class="blog-section spadpadding">
  <div class="container">
    <div class="row">
      @foreach($team_details as $main_data)
  <div class="col-md-4">
    <div class="team-member">
            <img src="{{URL::to('/')}}/images/team/{{$main_data->image_enc}}" alt="">
            <div class="member-info">
              <h3>{{$main_data->title}}</h3>
              <p>{!! $main_data->designation !!} </p>
             
            </div>
          </div>
  </div>
  @endforeach
  
  
</div>
  </div>
</section>

<section class="cta-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 d-flex align-items-center">
        <h2>We produce or supply Goods, Services, or Sources</h2>
      </div>
      <div class="col-lg-3 text-lg-right" >
        <a href="#" class="site-btn sb-dark">contact us</a>
      </div>
    </div>
  </div>
</section>



@endsection