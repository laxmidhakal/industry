<section class="cta-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 d-flex align-items-center">
                <h2>We produce or supply Goods, Services, or Sources</h2>
            </div>
            <div class="col-lg-3 text-lg-right" >
                <a href="{{URL::to('/contact')}}" class="site-btn sb-dark">contact us</a>
            </div>
        </div>
    </div>
</section>

<footer class="footer-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-widget">
                    <h2 class="fw-title ">Useful Resources</h2>
                    <ul >
                        <li><a href="{{URL::to('/about')}}">About Us</a></li>
                        <li><a href="{{URL::to('/gallery')}}">Gallery</a></li>
                        <li><a href="{{URL::to('/team')}}">Team</a></li>
                        <li><a href="{{URL::to('/product')}}">Product</a></li>
                        <li><a href="{{URL::to('/companies')}}">Companies</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-7">
                <div class="footer-widget">
                    @foreach($settings as $setting)
                    <h2 class="fw-title">Contact Us</h2>
                    <div class="footer-info-box">
                        <div class="fib-icon">
                            <img src="{{URL::to('/')}}/img/icons/map-marker.png" alt="" class="">
                        </div>
                        <div class="fib-text">
                            <p>{{$setting->address}} </p>
                        </div>
                    </div>
                    <div class="footer-info-box">
                        <div class="fib-icon">
                            <img src="{{URL::to('/')}}/img/icons/phone.png" alt="" class="">
                        </div>
                        <div class="fib-text">
                            <p>(+977) {{$setting->phone}}<br>{{$setting->email}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-5 col-md-6">
                <div class="footer-widget about-widget">
                    <!-- <img src="img/sas.png" alt="" class="img-fluid"> -->
                    <h2 class="fw-title"><span class="main-logo-text">Global</span> SAS Trading Pvt. Ltd. </h2>
                    @foreach($about_details as $detail)
                    <p> {!! Illuminate\Support\Str::limit($detail->description, 170) !!}</p>
                    @endforeach
                    <div class="footer-social">
                    @foreach($socials as $social)
                        <a href="" target="_blank" title="Share on Facebook"><i class="fa fa-facebook"></i></a>
                        <a href="" target="_blank" title="Share on Twitter" ><i class="fa fa-twitter"></i></a>
                        <a href="" target="_blank" title="Share on Google"><i class="fa fa-google-plus"></i></a>
                        <a href="" target="_blank" title="Share on Instagram"><i class="fa fa-instagram"></i></a>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-buttom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 ">
                    <div class="copyright my-3">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved Developed by <a href="https://techware.com.np" target="_blank" class="text-decoration-none">Techware Pvt. Ltd.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>