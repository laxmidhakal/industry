@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/3.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="display-4 text-white pt-5"> Companies</h2>
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
          <h2 class="text-capitalize">{{$main_data->title}} </h2>
          <p>{!! $main_data->description !!}</p>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="video-box set-bg main-about-img" data-setbg="{{URL::to('/')}}/images/company/{{$main_data->image_enc}}">
          @if($main_data->getCompanyContact != '')
          <a href="{{$main_data->getCompanyContact->video}}" class="video-popup">
            <i class="fa fa-play"></i>
          </a>
          @endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<section class="team-section my-3 pb-5">
  <div class="container">
    
    <div class="row">
         @foreach($company_contacts as $contact)
      <div class="col-md-4">
           <div class="contact-text">
             <h2>Get in Touch</h2>
             <p>{{$contact->title}}</p>
             <div class="header-info-box">
               <div class="hib-icon">
                 <img src="{{URl::to('/')}}/img/icons/phone.png" alt="" class="">
               </div>
               <div class="hib-text">
                 <h6>{{$contact->phone}}</h6>
                 <p>{{$contact->email}}</p>
               </div>
             </div>
             <div class="header-info-box">
               <div class="hib-icon">
                 <img src="{{URl::to('/')}}/img/icons/map-marker.png" alt="" class="">
               </div>
               <div class="hib-text">
                 <h6>{{$contact->address}}</h6>
               </div>
             </div>
           </div>
      </div>
      @endforeach
      <div class="col-md-8">
        <h2>Our Team</h2>
        <div class="row">
          @foreach($team_details->take(2) as $main_data)
          <div class="col-md-6">
            <div class="team-member">
              <img src="{{URL::to('/')}}/images/team/{{$main_data->image_enc}}" alt="{{$main_data->title}}" class="img-fluid w-100 main-team-img">
              <div class="member-info">
                <h3>{{$main_data->title}}</h3>
                <p>{{$main_data->designation}} </p>
                @if($main_data->facebook !='')
                <li class="list-inline-item my-auto pb-4">
                  <a href="{{$main_data->facebook}}" target="_blank" title="Share on Facebook" class=" link facebook text-center">
                    <i class="fa fa-facebook main-spin"></i>
                  </a>
                </li>
                @else
                <li class="list-inline-item my-auto pb-4">
                  <a href="{{$main_data->facebook}}"  title="Share on Facebook" class=" link facebook text-center">
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
                 @else
                 <li class="list-inline-item">
                  <a href=""  title="Share on Twitter" class="link twitter text-center">
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
                @else
                <li class="list-inline-item">
                  <a href="{{$main_data->linkedin}}"  title="Share on Linkedin" class="link linkedin text-center">
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
    </div>
  </div>
</section>

@endsection