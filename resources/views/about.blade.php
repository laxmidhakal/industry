@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h2 class="display-4 text-white text-padding">About us</h2>
			</div>
		</div>
	</div>
</section>

<!-- About section -->
<section class="main-about">
	<div class="container">
		<div class="row">
			@foreach($about_details as $main_data)
			<div class="col-lg-6">
				<img src="{{URL::to('/')}}/images/about/{{$main_data->image_enc}}" alt="{{$main_data->title}}" class="img-fluid w-100 main-about-img">
			</div>
			<div class="col-lg-6">
				<div class="about-text">
					<h2>{{$main_data->title}}</h2>
					<p>{!! $main_data->description !!} </p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="team-section spad">
	@if(count($team_details))
	<div class="container">
		<div class="team-text">
			<h2 >Our Amazing Team</h2>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="team-member">
			        @foreach($team_details as $main_data)
					<img src="{{URL::to('/')}}/images/team/{{$main_data->image_enc}}" alt="{{$main_data->title}}">
					<div class="member-info">
						<h3>{{$main_data->title}}</h3>
						<p>{{$main_data->designation}} </p>
					</div>
			        @endforeach
				</div>
			</div>
		</div>
	</div>
	@endif
</section>
@endsection

