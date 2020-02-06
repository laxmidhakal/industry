@extends('main')
@section('content')

<section class="page-top-section set-bg" data-setbg="img/page-top-bg/1.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-5">
        <h2 class="display-4">Product</h2>
        
        
      </div>
    </div>
  </div>
</section>
<section class="elements-section spad">
  <div class="container">
    <!-- element -->
    
    <!-- element -->
    <div class="element">
      <h3 class="el-title">Product </h3>
      <div class="row">
        <div class="col-xl-5">
          <!-- Accordions -->
          <div id="accordion" class="accordion-area">
            <div class="panel">
              <div class="panel-header active" id="headingOne">
                <button class="panel-link" data-toggle="collapse" data-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Trading</button>
              </div>
              <div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="panel-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. Lorem ipsum dolor sit amet, consectetur adipisc-ing elit. Quisque orci purus, sodales in est quis, blandit sollicitudin est. </p>
                </div>
              </div>
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
            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Trade</a>
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
          </div>
        </div>
      </div>
    </div>
    <!-- element -->
    
    <!-- element -->
    
    <!-- element -->
    
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