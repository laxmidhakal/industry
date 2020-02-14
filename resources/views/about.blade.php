@extends('main')
@section('content')@section('tab_title'){{$page_title}}@endsection
<!-- Page top section  -->
<section class="main-page-top set-bg" data-setbg="img/page-top-bg/1.jpg">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				<h2 class="display-4  text-white text-padding">About us</h2>
			</div>
		</div>
	</div>
</section>
<!-- Page top section end  -->
<!-- About section -->
<section class="main-about">
	<div class="container">
		<div class="row">
			@foreach($about_details as $main_data)
			<div class="col-lg-6">
				<img src="{{URL::to('/')}}/images/about/{{$main_data->image_enc}}" alt="{{$main_data->title}}">
			</div>
			<div class="col-lg-6">
				<div class="about-text">
					<h2>{{$main_data->title}}</h2>
					<p>{!! $main_data->description !!} </p>
					<!-- <div class="about-sign">
						<div class="sign">
							<img src="img/sign.png" alt="">
						</div>
						<div class="sign-info">
							<h5>Michael Smith</h5>
							<span>CEO Industrial INC</span>
						</div>
					</div> -->
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section>

<section class="team-section spad">
	<div class="container">
    	<div class="team-text">
			<h2 >Our Amazing Team</h2>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="team-member">
			        @foreach($team_details as $main_data)
					<img src="{{URL::to('/')}}/images/team/{{$main_data->image_enc}}" alt="">
					<div class="member-info">
						<h3>{{$main_data->title}}</h3>
						<p>{{$main_data->designation}} </p>
						<a href="#" class="site-btn">See C.V.</a>
					</div>
			        @endforeach
				</div>
			</div>	
		</div>
	</div>
</section>
<!-- Team section end -->
@endsection

