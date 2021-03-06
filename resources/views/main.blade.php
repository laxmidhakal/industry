<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>@yield('tab_title')</title>
  <meta charset="UTF-8">
  <meta name="description" content="Industry.INC HTML Template">
  <meta name="keywords" content="industry, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Favicon -->
  <link href="{{URL::to('/')}}/img/favicon.ico" rel="shortcut icon"/>
  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i&display=swap" rel="stylesheet">
  <!-- Stylesheets -->
  <link rel="stylesheet" href="{{URL::to('/')}}/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="{{URL::to('/')}}/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="{{URL::to('/')}}/css/magnific-popup.css"/>
  <link rel="stylesheet" href="{{URL::to('/')}}/css/slicknav.min.css"/>
  <link rel="stylesheet" href="{{URL::to('/')}}/css/owl.carousel.min.css"/>
  <!-- Main Stylesheets -->
  <link rel="stylesheet" href="{{URL::to('/')}}/css/style.css"/>
  <link rel="stylesheet" href="{{URL::to('/')}}/css/style.main.css"/>
  @yield('style')
  <!-- <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet"> -->
</head>
<body>
  <a name="top"></a>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>
  @include('header')
  @yield('content')
  @include('footer')
  <a id="back2Top" title="Back to top" href="#">&#10148;</a>
  <div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
      <div class="search-close-switch">+</div>
      <form class="search-model-form">
        <input type="text" id="search-input" placeholder="Search here.....">
      </form>
    </div>
  </div>
  
  <script src="{{URL::to('/')}}/js/jquery-3.2.1.min.js"></script>
  <script src="{{URL::to('/')}}/js/bootstrap.min.js"></script>
  <script src="{{URL::to('/')}}/js/jquery.slicknav.min.js"></script>
  <script src="{{URL::to('/')}}/js/owl.carousel.min.js"></script>
  <script src="{{URL::to('/')}}/js/circle-progress.min.js"></script>
  <script src="{{URL::to('/')}}/js/jquery.magnific-popup.min.js"></script>
  <script src="{{URL::to('/')}}/js/main.js"></script>
  @yield('javascript')
  <!-- <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script> -->
  <script type="text/javascript">
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 500) {
            $('#back2Top').fadeIn();
        } else {
            $('#back2Top').fadeOut();
        }
    });
    $(document).ready(function() {
        $("#back2Top").click(function(event) {
            event.preventDefault();
            $("html, body").animate({ scrollTop: 0 }, "slow");
            return false;
        });

    });
  </script>

</body>
</html>
