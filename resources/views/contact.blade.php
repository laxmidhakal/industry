@extends('main')
@section('content')
<section class="main-page-top set-bg" data-setbg="img/page-top-bg/4.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="display-4 text-white text-padding">Contact</h2>
       
      </div>
    </div>
  </div>
</section>
<div class="map-section">
  <div class="container">
    <div class="map-info">
      <img src="img/logo-contact.png" alt="">
      <p>Lorem ipsum dolor sit amet, consec-tetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. </p>
    </div>
  </div>
  <div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14376.077865872314!2d-73.879277264103!3d40.757667781624285!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1546528920522" style="border:0" allowfullscreen></iframe>
  </div>
</div>
<section class="contact-section spad">
  <div class="container">
    <div class="row">
      
      <div class="col-lg-8">
        <form class="contact-form">
          <div class="row">
            <div class="col-lg-6">
              <input type="text" placeholder="Your Name">
            </div>
            <div class="col-lg-6">
              <input type="text" placeholder="Your Email">
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-12">
              <input type="text" placeholder="Subject">
              <textarea class="text-msg" placeholder="Message"></textarea>
              <button class="site-btn" type="submit">send message</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="contact-text">
          <h2>Get in Touch</h2>
          <p>Innovation and simplicity makes us happy: our goal is to remove any technical or financial barriers that can prevent business owners from making their own website.</p>
          <div class="header-info-box">
            <div class="hib-icon">
              <img src="img/icons/phone.png" alt="" class="">
            </div>
            <div class="hib-text">
              <h6>(+977) 01-5901288</h6>
              <p>contact@yourdomain.com</p>
            </div>
          </div>
          <div class="header-info-box">
            <div class="hib-icon">
              <img src="img/icons/map-marker.png" alt="" class="">
            </div>
            <div class="hib-text">
              <h6>K.M.C. 32, Pepsicola</h6>
              <p>Kathmandu, Nepal </p>
            </div>
          </div>
        </div>
      </div>
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