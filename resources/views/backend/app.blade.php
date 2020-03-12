<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard</title>
  <meta name="description" content="Industry.INC HTML Template">
  <meta name="keywords" content="industry, html">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{URL::to('/')}}/img/favicon.ico" rel="shortcut icon"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/all.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/adminlte.min.css">
  <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/style.back.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('style')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      @include('backend.header')
      @include('backend.sidebar')
      @yield('content')
      @include('backend.footer')
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <script src="{{URL::to('/')}}/backend/js/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/backend/js/bootstrap.bundle.min.js"></script>
    <script src="{{URL::to('/')}}/backend/plugins/pace-progress/pace.min.js"></script>
    <script src="{{URL::to('/')}}/backend/js/adminlte.js"></script>
    <!-- sidebarcontrol -->
    <script src="{{URL::to('/')}}/backend/js/demo.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    @yield('javascript')
   <script>
     $(function () {
       CKEDITOR.replace('description');
     });
   </script>
   <script type="text/javascript">
     $(".sort").keydown(function (e) {
       Pace.start();
       if (e.which == 9){
         var id = $(event.target).attr('ids'),
         page = $(event.target).attr('page'),
         token = $('meta[name="csrf-token"]').attr('content'),
               value = document.getElementById('someElement'+id).innerHTML; //value of the text input
               var url= "{{URL::to('/')}}/home/sort/"+page;
               $.ajax({
                 type:"POST",
                 dataType:"JSON",
                 url:url,
                 data:{
                   _token:token,
                   id : id,
                   value:value,
                 },
                 success:function(e){
                   location.reload();
                 },
                 error: function (e) {
                   alert('Sorry! this data is used some where');
                   Pace.start();
                 }
               });
             }
           });
   </script>
   <script type="text/javascript">
     function readURL(input) {
       if (input.files && input.files[0]) {
         var reader = new FileReader();
         reader.onload = function (e) {
           $('#profile-img-tag').attr('src', e.target.result);
         }
         reader.readAsDataURL(input.files[0]);
       }
     }
     $("#image").change(function(){
       readURL(this);
     });
   </script>
</body>
</html>
