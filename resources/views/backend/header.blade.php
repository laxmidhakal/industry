<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{URL::to('/')}}/" class="nav-link">Website</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{URL::to('/')}}/home/setting" class="nav-link">Setting</a>
    </li>
  </ul>

  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      
      <a href="{{ route('logout') }}"  class="nav-link bg-danger float-right"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      <i class="fa fa-power-off"></i>
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      {{ csrf_field() }}
    </form>
    
  </li>

    <!-- <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
  </ul>
</nav>