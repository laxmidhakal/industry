<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/all.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/backend/plugins/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/adminlte.min.css">
    <link rel="stylesheet" href="{{URL::to('/')}}/backend/css/style.back.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
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
   <script>
     $(function () {
       // Replace the <textarea id="editor1"> with a CKEditor
       // instance, using default configuration.
       // CKEDITOR.replace('editor1');
       CKEDITOR.replace('description');
       //bootstrap WYSIHTML5 - text editor
     });
   </script>
</body>
</html>
