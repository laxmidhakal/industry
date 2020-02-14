<header class="header-section clearfix">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li class="list-inline-item"><p class="text-light"> Welcome to Global SAS Trading Pvt. Ltd.</p></li>
                    </ul>
                </div>
                
                <div class="col-md-6 text-md-right">
                    <ul class="list-inline">
                    @foreach($settings as $setting)
                        <li class="list-inline-item text-light main-font-12">
                            <i class="fa fa-phone mr-1"></i> 
                            +977-{{$setting->phone}}
                        </li>
                        <li class="list-inline-item text-light main-font-12">
                            <i class="fa fa-envelope mr-1"></i> 
                            {{$setting->email}}
                        </li>
                    @endforeach
                    @foreach($socials as $social)
                   @if($social->facebook !='')
                        <li class="list-inline-item my-auto">
                            <a href=" {{$social->facebook}}" target="_blank" title="Share on Facebook" class=" link facebook text-center">
                                <i class="fa fa-facebook main-spin"></i>
                            </a>
                        </li>
                     @endif

                        <li class="list-inline-item">
                            <a href="{{$social->twitter}}" target="_blank" title="Share on Twitter" class="link twitter text-center">
                                <i class="fa fa-twitter main-spin" ></i>
                            </a>
                        </li>
                        
                        <li class="list-inline-item">
                            <a href="{{$social->linkedin}}" target="_blank" class="link linkedin text-center">
                                <i class="fa fa-linkedin main-spin"></i>
                            </a>
                        </li>
                    @endforeach
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
                    <a href="" class="site-logo mt-md-2 pl-md-0 ">
                    @foreach($settings as $setting)
                        <img src="{{URL::to('/')}}/images/setting/{{$setting->image_enc}}" alt="" class="img-fluid main-logo" >
                    @endforeach
                    </a>
                </div>
                
                <!-- Menu -->
                <div class="col-md-8 pr-md-0">
                    <nav class="site-nav-menu header-right pr-md-0">
                        <ul>
                            <li class="{{Request::route()->getName() == 'index' ? 'active' : ''}}"><a href="{{URL::to('/')}}">Home</a></li>
                            <li class="{{Request::route()->getName() == 'about' ? 'active' : ''}}"><a href="{{URL::to('/about')}}">About</a></li>
                            <li class="{{Request::route()->getName() == 'companies' ? 'active' : ''}}"><a  href="{{URL::to('/companies')}}">Companies</a>
                            </li>
                            <li class="{{Request::route()->getName() == 'gallery' ? 'active' : ''}}"><a href="{{URL::to('/gallery')}}">Gallery</a></li>
                            <li class="{{Request::route()->getName() == 'product' ? 'active' : ''}}"><a href="javascript:void(0);">Product</a>
                                @if(count($product_menu))
                                <ul class="sub-menu">
                                    @foreach($product_menu as $menu_pro)
                                    <li><a href="{{URL::to('/')}}/product/{{$menu_pro->slug}}">{{$menu_pro->title}}</a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            <li class="{{Request::route()->getName() == 'team' ? 'active' : ''}}"><a href="{{URL::to('/team')}}">Team</a></li>
                            <li class="{{Request::route()->getName() == 'contact' ? 'active' : ''}}"><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>