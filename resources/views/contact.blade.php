@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
@endsection
@section('content')
<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/4.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="display-4 text-white pt-5">Contact</h2>       
      </div>
    </div>
  </div>
</section>
<div class="map-section">
  <div class="container">
    <div class="map-info">
       <h2 class="fw-title"><span class="text-white">Global</span>SAS Trading</h2>
        @foreach($about_details as $main_data) 
       <p>{!! str_limit($main_data->description, 156)!!}</p>
       @endforeach
    </div>
  </div>
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3063.7045332455314!2d85.35806101467352!3d27.68885058279959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1a23ff53c6c1%3A0xbf154d5bf0abe0ba!2sPepsicola!5e1!3m2!1sen!2snp!4v1581663076469!5m2!1sen!2snp" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
  </div>
</div>

<section class="contact-section spad">
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
  </div>
  <br>
  @endif
  <div class="container">
    <div class="row">      
      <div class="col-lg-8">
        <form class="contact-form" method="POST" action="{{URL::to('/')}}/contact/store" id="form">
            {{ csrf_field() }}  
          <div class="row">
            @include('backend.frontflash.alertmsg')
            <div class="col-lg-6">
              <input type="text"  id="name" placeholder="Enter Your Name" name="name" required="true">
              <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="col-lg-6">
              <input type="email" placeholder="Your Email" name="email" id="email" required="true" autocomplete="off">
              <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>  
            <div class="col-lg-12">
              <input type="text"  id="subject" placeholder="Subject" name="subject" required="true">
              <span class="text-danger">{{ $errors->first('subject') }}</span>
              <textarea class="text-msg" placeholder="Message" id="message" name="message" required="true"></textarea>
              <span class="text-danger">{{ $errors->first('message') }}</span>
              <button class="site-btn " type="submit" name="submit">send message</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="contact-text">
          <h2>Get in Touch</h2>
           @foreach($about_details as $main_data)
          <p>{!! str_limit($main_data->description, 156)!!}</p>
          @endforeach
         @foreach($settings as $setting)
          <div class="header-info-box">
            <div class="hib-icon">
              <img src="{{URL::to('/')}}/img/icons/phone.png" alt="" class="">
            </div>
            <div class="hib-text">
              <h6>(+977) {{$setting->phone}}</h6>
              <p>{{$setting->email}}</p>
            </div>
          </div>
          <div class="header-info-box">
            <div class="hib-icon">
              <img src="{{URL::to('/')}}/img/icons/map-marker.png" alt="" class="">
            </div>
            <div class="hib-text">
              <h6>{{$setting->address}}</h6>
            </div>
          </div>
         @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('javascript')
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
<script src="{{URL::to('/')}}/js/adminlte.min.js"></script>
 <script>
    $(document).ready(function () {
    $('#form').validate({ // initialize the plugin
        rules: {
            name: {
                required: true
            },
            email: {
               required: true,
               maxlength: 50,
               email: true,
            },
             subject: {
                required: true
            },
             message: {
                required: true
            },
        }
    });
});
</script>
</div>    
@endsection