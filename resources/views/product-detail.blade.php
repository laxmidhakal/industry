@extends('main')
@section('tab_title'){{$page_title}}@endsection
@section('content')

<section class="main-page-top set-bg" data-setbg="{{URL::to('/')}}/img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4 text-white text-padding">Product</h2>
        
        
      </div>
    </div>
  </div>
</section>
<section class="elements-section spad">
  <div class="container">
    <!-- element -->
    
    <!-- element -->
    <div class="element">
      <h3 class="el-title">ProductDetail </h3>
      <div class="row">
        <div class="col-xl-5">
          <!-- Accordions -->
          <div id="accordion" class="accordion-area">
            <div class="panel">
              @foreach($product_details as $main_data)
              <div class="panel-header active" id="headingOne">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">{{$main_data->title}}</button>
              </div>
              <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="panel-body">
                  <p>{!! $main_data->description !!} </p>
                </div>
              </div>
              @endforeach
            </div>
            <div class="panel">
              <div class="panel-header" id="headingTwo">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">Restaurant</button>
              </div>
              <div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="panel-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipisc-ing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est.</p>
                </div>
              </div>
            </div>
            <div class="panel">
              <div class="panel-header" id="headingThree">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Green Trade</button>
              </div>
              <div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="panel-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipisc-ing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
                </div>
              </div>
            </div>
            <div class="panel">
              <div class="panel-header" id="headingFour">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">Green Trade</button>
              </div>
              <div id="collapse4" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                <div class="panel-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipisc-ing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
                </div>
              </div>
            </div>
            
            

          </div>
        </div>
        <div class="col-xl-7">
          <div class="tab-element">
            @foreach($product_details as $main_data)
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">{{$main_data->title}}</a>
                
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Restaurant</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Trade</a>
              </li>
              
            </ul>
            <div class="tab-content" id="myTabContent">
              <!-- single tab content -->
              <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab-1">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
              </div>
              <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab-2">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
              </div>
              <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="tab-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
              </div> 
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection