@extends('main')
@section('content')@section('tab_title'){{$page_title}}@endsection
<section class="hero-section">
    <div class="hero-slider owl-carousel">
        @foreach($index_details as $main_data)
        <div class="hero-item set-bg" data-setbg="{{URL::to('/')}}/images/slider/{{$main_data->image_enc}}">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <h2 class="main-slide-text">
                            <?php 
                            $words = explode(' ', $main_data->title);
                            $count = substr_count($main_data->title, ' ');
                            for ($i = 0; $i <= $count && isset($words[$i]); $i++) {
                                ?>
                                <span>{{$words[$i]}} </span>
                            <?php } ?>
                        </h2>
                        <a href="{{ route('about') }}" class="site-btn sb-white mr-4 mb-3">Read More</a>
                        <a href="{{ route('companies') }}" class="site-btn sb-dark">Our Company</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

<section class="clients-section spad">
    <div class="container">
        <div class="text-center">
             @foreach($about_details as $about)
            <h2 class="mb-5">{{$about->title}}</h2>
            <p>{!! Illuminate\Support\Str::limit($about->description, 506) !!}</p>
            @endforeach
            <button class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-outline" >  <a href="{{ route('about') }}" class="main-btn-outline">Read More</a></button>
        </div>
    </div>
</section>

<section class="reserch-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-tabs reserch-tab-menu" role="tablist">                    
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Category</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-5" aria-selected="false">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Category</a>
                    </li><li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-6" aria-selected="false">Category</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="tab-content reserch-tab">
                    <!-- single tab content -->
                    <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                        <div id="client-carousel" class="client-slider owl-carousel">
                            <div class="single-brand">
                                <div class="team-member">
                                    <img src="img/product.jpg" alt="">
                                    <div class="member-info">
                                        <h3 class="text-light">Product Name</h3>
                                        <p>Some Text </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-brand">
                                <div class="team-member">
                                    <img src="img/product.jpg" alt="">
                                    <div class="member-info">
                                        <h3 class="text-light">Product Name</h3>
                                        <p>Some Text </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-brand">
                                <div class="team-member">
                                    <img src="img/product.jpg" alt="">
                                    <div class="member-info">
                                        <h3 class="text-light">Product Name</h3>
                                        <p>Some Text </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-brand">
                                <div class="team-member">
                                    <img src="img/product.jpg" alt="">
                                    <div class="member-info">
                                        <h3 class="text-light">Product Name</h3>
                                        <p>Some Text </p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-brand">
                                <div class="team-member">
                                    <img src="img/product.jpg" alt="">
                                    <div class="member-info">
                                        <h3 class="text-light">Product Name</h3>
                                        <p>Some Text </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                        <h2>We produce or supply Goods, & Services, Oils & Lubricants</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor.</p>
                        <p>Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis</p>
                    </div>
                    <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                        <h2>We produce or supply Goods, & Services, Oils & Lubricants</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="tab-4">
                        <h2>We produce or supply Goods, & Services, Oils & Lubricants</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor.</p>
                        <p>Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="tab-5">
                        <h2>We produce or supply Goods, & Services, Oils & Lubricants</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor.</p>
                        <p>Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="tab-6">
                        <h2>We produce or supply Goods, & Services, Oils & Lubricants</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor.</p>
                        <p>Quisque orci purus, sodales in est quis, blandit sollicitudin est. Nam ornare ipsum ac accumsan auctor. Donec consequat arcu et commodo interdum. Vivamus posuere lorem lacus.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis commodo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection