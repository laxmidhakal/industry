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
<section class="clients-section spad">
@if(count($about_details))
    <div class="container">
        <div class="text-center">
            @foreach($about_details as $about)
            <h2 class="mb-5">{{$about->title}}</h2>
            <p>{!! str_limit($about->description, 506)!!}</p>
            @endforeach
            <a class="mt-md-3 btn btn-outline-primary rounded-0 main-btn-outline" href="{{ route('about') }}">Read More</a>
        </div>
    </div>
@endif
</section>
@if(count($product_menu))
<section class="reserch-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="nav nav-tabs reserch-tab-menu" role="tablist">
                    @foreach($product_menu as $key=>$product_list)                    
                    <li class="nav-item">
                        <a class="nav-link {{ $key ? '' : 'active' }}" data-toggle="tab" href="#tab-{{$product_list->id}}" role="tab" aria-controls="tab-{{$product_list->id}}" aria-selected="true">{{$product_list->title}}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8">
                <div class="tab-content reserch-tab">
                    <!-- single tab content -->
                    @foreach($product_menu as $key=>$product_main)                    
                    <div class="tab-pane fade  {{ $key ? '' : 'show active' }}" id="tab-{{$product_main->id}}" role="tabpanel" aria-labelledby="tab-{{$product_main->id}}">
                        <div class="row">
                            @foreach($product_main->getProductDetail()->take(3)->get() as $product_detail)
                            <div class="col-lg-4 col-md-6" >
                                <div class="feature-box">
                                    <img src="{{URL::to('/')}}/images/productdetail/{{$product_detail->image_enc}}" alt="{{$product_detail->title}}"  class="img-fluid w-100 main-product-index-img  " id="productpopover-{{$key+1}}" title="{{$product_detail->title}}" data-container="body" data-toggle="popover" data-placement="bottom" data-content="{{ strip_tags( str_limit($product_detail->description, 50) ) }}" data-original-title="{{$product_detail->title}}">
                                     <a href="{{URL::to('/')}}/product/{{$product_detail->getProduct->slug}}/{{$product_detail->slug}}">
                                     </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-md-5 d-flex justify-content-center">
                            <a class="btn btn-outline-primary rounded-0 main-product-btn-outline" href="{{ URL::to('/')}}/product/{{$product_main->slug }}">Read More</a>
                        </div>
                    </div>
                    @endforeach
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
                <a href="{{URL::to('/contact')}}" class="site-btn sb-dark">contact us</a>
            </div>
        </div>
    </div>
</section>
@endif
@endsection
@section('javascript')
<script src="{{URL::to('/')}}/js/popper.min.js"></script>
<script src="{{URL::to('/')}}/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'bottom',
        trigger : 'hover',
    });
});
</script>
@endsection
