@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')
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
@if(count($about_details))
<section class="clients-section spad">
    <div class="container">
        <div class="text-center">
             @foreach($about_details as $about)
            <h2 class="mb-5">{{$about->title}}</h2>
            <p>{!! Illuminate\Support\Str::limit($about->description, 506) !!}</p>
            @endforeach
            <button class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-outline" ><a href="{{ route('about') }}">Read More</a></button>
        </div>
    </div>
</section>
@endif

<section class="reserch-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-tabs reserch-tab-menu" role="tablist">
                    @foreach($product_menu as $key=>$product_list)                    
                    <li class="nav-item">
                        <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab" href="#tab-{{$product_list->id}}" role="tab" aria-controls="tab-{{$product_list->id}}" aria-selected="true">{{$product_list->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="tab-content reserch-tab">
                    <!-- single tab content -->
                    @foreach($product_menu as $key=>$product_main)                    
                    <div class="tab-pane fade  {{ $key == 0 ? 'show active' : '' }}" id="tab-{{$product_main->id}}" role="tabpanel" aria-labelledby="tab-{{$product_main->id}}">
                        <div id="client-carousel" class="client-slider owl-carousel">
                            @foreach($product_main->getProductDetail()->get() as $product_detail)
                            <div class="single-brand">
                                <div class="team-member">
                                    <img src="{{URL::to('/')}}/images/productdetail/{{$product_detail->image_enc}}" alt="{{$product_detail->title}}"  class="img-fluid w-100 main-product-img">
                                    <div class="member-info">
                                        <h3 class="text-light">{{$product_detail->title}}</h3>
                                        <p>{{$product_detail->title}} </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection