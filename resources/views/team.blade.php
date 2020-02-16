@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 text-white pt-5">Team</h2>
      </div>
    </div>
  </div>
</section>

<section class="blog-section my-5">
  <div class="container">
    <div class="row">
      @foreach($team_details as $main_data)
      <div class="col-md-4">
        <div class="team-member main-team-hover">
          <img src="{{URL::to('/')}}/images/team/{{$main_data->image_enc}}" alt="{{$main_data->title}}" class="img-fluid w-100 main-team-img">
          <div class="member-info pb-2">
            <h3>{{$main_data->title}}</h3>
            <p>{!! $main_data->designation !!} </p>
          </div>
        </div>
        <div class="mt-4">
          {!! $team_details->links("pagination::bootstrap-4") !!}
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection