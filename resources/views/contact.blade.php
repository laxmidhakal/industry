@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<style>
 #snackbar {
     visibility: hidden;
     min-width: 250px;
     margin-left: 0px;
     background-color: #5cb85c;
     border-color: #4cae4c;
     color: #fff;
     text-align: center;
     border-radius: 2px;
     padding: 16px;
     position: fixed;
     z-index: 1;
     right:  8%;
     top: 30px;
     font-size: 17px;
     
 }

 #snackbar.show {
     visibility: visible;
     -webkit-animation: fadein 0.5s, fadeout 0.5s 3.5s;
     animation: fadein 0.5s, fadeout 0.5s 3.5s;
 }

 @-webkit-keyframes fadein {
     from {top: 0; opacity: 0;} 
     to {top: 30px; opacity: 1;}
 }

 @keyframes fadein {
     from {top: 0; opacity: 0;}
     to {top: 30px; opacity: 1;}
 }

 @-webkit-keyframes fadeout {
     from {top: 30px; opacity: 1;} 
     to {top: 0; opacity: 0;}
 }

 @keyframes fadeout {
     from {top: 30px; opacity: 1;}
     to {top: 0; opacity: 0;}
 }

</style>
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
  <div class="container">
    <div class="row">      
      <div class="col-lg-8 ">
        <div class="box">
          <form class="contact-form" method="POST" action="{{URL::to('/')}}/contact/store" id="validate_form" >
              {{ csrf_field() }}  
            <div class="row">
              @include('backend.frontflash.alertmsg')
              <div class="col-lg-6">
                <input type="text"  id="name" placeholder="Enter Your Name" name="name"  required data-parsley-trigger="keyup" autocomplete="off">
              </div>
              <div class="col-lg-6">
                <input type="email" placeholder="Youremail@gmail.com" name="email" id="email"  autocomplete="off" required data-parsley-type="email" data-parsley-trigger="keyup">
              </div>  
              <div class="col-lg-12">
                <input type="text"  id="subject" placeholder="Subject" name="subject"  required data-parsley-trigger="keyup" autocomplete="off">
                <textarea class="text-msg" placeholder="Message" id="message" name="message" required data-parsley-trigger="keyup"></textarea>
                <button class="site-btn " type="submit" name="submit">send message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="contact-text">
          <h2>Get in Touch</h2>
          @if(count($about_details))
          @foreach($about_details as $main_data)
          <p>{!! str_limit($main_data->description, 156)!!}</p>
          @endforeach
          @endif
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
<div id="snackbar"> Data is Submitted Successfully</div>

@endsection
@section('javascript')
<script src="http://parsleyjs.org/dist/parsley.js"></script>
<script>
  $(document).ready(function(){
   $('#validate_form').parsley();
   $('#validate_form').on('submit', function(event){
    event.preventDefault();
    var url = '{{URL::to('/')}}/contact/store';
    var x = document.getElementById("snackbar");
    if($('#validate_form').parsley().isValid())
    {
      debugger;
     $.ajax({
      url: url,
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function()
      {
       $('#submit').attr('disabled', 'disabled');
       $('#submit').val('Submitting...');
     },
     success:function(event)
     {
       debugger;
       $('#validate_form')[0].reset();
       $('#validate_form').parsley().reset();
       $('#submit').attr('disabled', false);
       $('#submit').val('Submit');
       x.className = "show";
       setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
     },
     error: function (event) {
       alert('Sorry! this data is used some where');
     }
   });
   }
 });

 });
</script>
<script>
  function myFunction() {
    
  }
</script>
@endsection