@extends('main')
@section('content')

<section class="page-top-section set-bg" data-setbg="img/page-top-bg/3.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-7">
        <h2 class="display-4">Companies</h2>
       
      </div>
    </div>
  </div>
</section>
<section class="blog-section spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-6 sidebar order-2 order-lg-1">
        <div class="sb-widget">
          <form class="sb-search">
            <input type="text" placeholder="Search">
            <button><i class="fa fa-search"></i></button>
          </form>
        </div>
        <div class="sb-widget">
          <h2 class="sb-title">Categories</h2>
          <ul>
            <li><a href="">Metal Industry Process</a></li>
            <li><a href="">Agricultural Engineering</a></li>
            <li><a href="">Green  Energy Process</a></li>
            <li><a href="">Chemical Research</a></li>
            <li><a href="">Oil Extractions Process</a></li>
            <li><a href="">Manufactoring Process</a></li>
          </ul>
        </div>
        <div class="sb-widget">
          <h2 class="sb-title">Categories</h2>
          <div class="recent-post">
            <div class="rp-item">
              <img src="img/blog/recent-post/1.jpg" alt="">
              <div class="rp-text">
                <p>All you need to know about Oil</p>
                <div class="rp-date">08 Feb,laxm 2019</div>
              </div>
            </div>
            <div class="rp-item">
              <img src="img/blog/recent-post/2.jpg" alt="">
              <div class="rp-text">
                <p>All you need to know about Oil</p>
                <div class="rp-date">08 Feb, 2019</div>
              </div>
            </div>
            <div class="rp-item">
              <img src="img/blog/recent-post/3.jpg" alt="">
              <div class="rp-text">
                <p>All you need to know about Oil</p>
                <div class="rp-date">08 Feb, 2019</div>
              </div>
            </div>
          </div>
        </div>
        <div class="sb-widget">
          <div class="info-box">
            <h3>Contact Us for Help</h3>
            <p>Innovation and simplicity makes us happy: our goal is to remove any technical or financial barriers that can prevent business owners from making their own website. </p>
            <div class="footer-info-box">
              <div class="fib-icon">
                <img src="img/icons/phone.png" alt="" class="">
              </div>
              <div class="fib-text">
                <p>+546 990221 123<br>contact@industryalinc.com</p>
              </div>
            </div>
            <a href="#">Send us a message</a>
          </div>
          <a href="" class="site-btn w-100">Download Brochure</a>
        </div>
      </div>
      <div class="col-lg-8 order-1 order-lg-2">
        <div class="blog-post">
          <div class="blog-thumb set-bg" data-setbg="img/blog/1.jpg">
            <div class="blog-date">08 Feb,laxmi 2019</div>
          </div>
          <div class="blog-metas">
            <div class="blog-meta meta-author">by <a href="">James Smith</a></div>
            <div class="blog-meta meta-cata">in <a href="">Industry</a></div>
            <div class="blog-meta meta-comment"><a href="">3 Comments</a></div>
          </div>
          <h2>All you need to know about Engineering </h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin estst quis, blandit sollicitudi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin estst quis, blandit sollicitudi</p>
          <a href="#" class="site-btn read-more">read more</a>
        </div>
        <div class="blog-post">
          <div class="blog-thumb set-bg" data-setbg="img/blog/2.jpg">
            <div class="blog-date">08 Feb, 2019</div>
          </div>
          <div class="blog-metas">
            <div class="blog-meta meta-author">by <a href="">James Smith</a></div>
            <div class="blog-meta meta-cata">in <a href="">Industry</a></div>
            <div class="blog-meta meta-comment"><a href="">3 Comments</a></div>
          </div>
          <h2>Green Energy for everyone</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin estst quis, blandit sollicitudi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin estst quis, blandit sollicitudi</p>
          <a href="#" class="site-btn read-more">read more</a>
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