<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="{{URL::to('/')}}/index3.html" class="brand-link">
    <img src="{{URL::to('/')}}/img/sas.png"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{URL::to('/')}}/backend/images/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/slider" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Slider</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/about" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>About</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/gallery" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Gallery</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/company" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Company</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/product" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Product</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/team" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Team</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="{{URL::to('/')}}/home/setting" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Setting</p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</aside>