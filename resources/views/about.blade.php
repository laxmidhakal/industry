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
				<img src="{{URL::to('/')}}/images/about/{{$main_data->image_enc}}" alt="">
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
			<p>Visuals are such a big part of an About Us page, and Active Campaign does a great job showing off their employees and their office environment. They also have a small section describing what a normal day in the office is like. This helps entice prospective employees while also putting a face to the company and making it more relatable.</p>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="team-member">
					<img src="img/team/1.jpg" alt="">
					<div class="member-info">
						<h3>Michael Smith</h3>
						<p>Engeneer Chemist </p>
						<a href="#" class="site-btn">See C.V.</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="team-member">
					<img src="img/team/2.jpg" alt="">
					<div class="member-info">
						<h3>Jessica Steing</h3>
						<p>Engeneer Chemist </p>
						<a href="#" class="site-btn">See C.V.</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="team-member">
					<img src="img/team/3.jpg" alt="">
					<div class="member-info">
						<h3>Chris Williams</h3>
						<p>Engeneer Chemist </p>
						<a href="#" class="site-btn">See C.V.</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Team section end -->
@endsection

