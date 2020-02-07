<header class="header-section clearfix">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul >
                        
                        <li class="list-inline-item"><p  class="text-light "> Welcome to Global SAS Trading Pvt. Ltd.</p></li>
                    </ul>
                </div>
                
                <div class="col-md-6 text-md-right">
                    <ul class="list-inline">
                      <li class="list-inline-item text-light main-font-12">
                        <i class="fa fa-phone mr-1"></i> 
                        +977-21-522451/53768
                    </li>
                    <li class="list-inline-item text-light main-font-12">
                        <i class="fa fa-envelope mr-1"></i> 
                        info@gmail.com
                    </li>

                    <li class="list-inline-item my-auto">
                        <a href="" class=" link facebook text-center">
                            <i class="fa fa-facebook main-spin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="link twitter text-center">
                            <i class="fa fa-twitter main-spin" ></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="" class="link linkedin text-center">
                            <i class="fa fa-linkedin main-spin"></i>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="site-navbar">
        <!-- Logo -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="index.html" class="site-logo mt-md-2 pl-md-0 ">
                        <img src="img/sas.png" alt="" class="img-fluid main-logo" >
                    </a>
                </div>
                
                <!-- <div class="header-right">
                    <div class="header-info-box">
                        <div class="hib-icon">
                            <img src="img/icons/phone.png" alt="" class="">
                        </div>
                        <div class="hib-text">
                            <h6>+546 990221 123</h6>
                            <p>contact@industryalinc.com</p>
                        </div>
                    </div>
                    <div class="header-info-box">
                        <div class="hib-icon">
                            <img src="img/icons/map-marker.png" alt="" class="">
                        </div>
                        <div class="hib-text">
                            <h6>Main Str, no 23</h6>
                            <p>NY, New York PK 23589</p>
                        </div>
                    </div>
                    <button class="search-switch"><i class="fa fa-search"></i></button>
                </div> -->
                <!-- Menu -->
                <div class="col-md-8 pr-md-0">
                 
                    <nav class="site-nav-menu header-right pr-md-0 " >
                        <ul >
                            <li class="{{Request::route()->getName() == 'index' ? 'active' : ''}}"><a href="{{URL::to('/')}}">Home</a></li>

                            <li class="{{Request::route()->getName() == 'about' ? 'active' : ''}}"><a href="{{URL::to('/about')}}">About</a></li>
                            <li class="{{Request::route()->getName() == 'companies' ? 'active' : ''}}"><a  href="{{URL::to('/companies')}}">Companies </a>
                                <ul class="sub-menu">
                                    <li><a href="elements.html">Elements</a></li>
                                </ul>
                            </li>
                            <li class="{{Request::route()->getName() == 'gallery' ? 'active' : ''}}"><a href="{{URL::to('/gallery')}}">Gallery</a></li>
                            <li class="{{Request::route()->getName() == 'product' ? 'active' : ''}}"><a href="{{URL::to('/product')}}">Product</a></li>
                            <li class="{{Request::route()->getName() == 'team' ? 'active' : ''}}"><a href="{{URL::to('/team')}}">Team</a></li>
                            <li class="{{Request::route()->getName() == 'contact' ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>

               
            </div>
        </div>

    </div>
</header>