@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h2 class="display-4 text-white pt-5">About us</h2>
			</div>
		</div>
	</div>
</section>
<!-- About section -->
@if(count($about_details))
<section class="main-about">
	<div class="container">
		<div class="row">
			@foreach($about_details as $about_data)
			<div class="col-lg-6">
				<img src="{{URL::to('/')}}/images/about/{{$about_data->image_enc}}" alt="{{$about_data->title}}" class="img-fluid w-100 main-about-img">
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
@endif

<section class="team-section spad">
	@if(count($team_details))
	<div class="container">
		<div class="team-text">
			<h2 >Our Team</h2>
		</div>
		<div class="row">
			@foreach($team_details->take(3) as $main_data)
			<div class="col-md-4">
				<div class="team-member">
					<img src="{{URL::to('/')}}/images/team/{{$main_data->image_enc}}" alt="{{$main_data->title}}" class="img-fluid w-100 main-team-img ">
					<div class="member-info">
						<h3>{{$main_data->title}}</h3>
						<p>{{$main_data->designation}} </p>
						@if($main_data->facebook !='')
						<li class="list-inline-item my-auto pb-4">
						  <a href="{{$main_data->facebook}}" target="_blank" title="Share on Facebook" class=" link facebook text-center">
						    <i class="fa fa-facebook main-spin"></i>
						  </a>
						</li>
						@endif
						@if($main_data->twitter !='')
						<li class="list-inline-item">
						  <a href="{{$main_data->twitter}}" target="_blank" title="Share on Twitter" class="link twitter text-center">
						    <i class="fa fa-twitter main-spin" ></i>
						  </a>
						</li>
						@endif
						@if($main_data->linkedin !='')
						<li class="list-inline-item">
						  <a href="{{$main_data->linkedin}}" target="_blank" title="Share on Linkedin" class="link linkedin text-center">
						    <i class="fa fa-linkedin main-spin"></i>
						  </a>
						</li>
						@endif
					</div>
				</div>
			</div>				
			@endforeach
		</div>
	</div>
	@endif
</section>
@endsection


