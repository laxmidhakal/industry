<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{url('/')}}/backend/css/summernote.css">
    <link rel="stylesheet" href="{{url('/')}}/backend/pace-progress/themes/black/pace-theme-flat-top.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">


</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        


        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="{{url('/')}}/manager">Home</a></li>
                                <li class="breadcrumb-item active">Abc</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <section class="content">
                <div class="container-fluid">
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div>
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <!-- Main content -->
                    @yield('content')
                <!-- /.content -->
                </div>
                </div>
            </section>
        <!-- /.content-wrapper -->
        @include('backend.footer')

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{url('/')}}/backend/js/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{url('/')}}/backend/js/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('/')}}/backend/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="{{url('/')}}/backend/js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="{{url('/')}}/backend/js/sparkline.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{url('/')}}/backend/js/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="{{url('/')}}/backend/js/moment.min.js"></script>
    <script src="{{url('/')}}/backend/js/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('/')}}/backend/js/tempusdominus-bootstrap-4.js"></script>
    <!-- Summernote -->
    <script src="{{url('/')}}/backend/js/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('/')}}/backend/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="{{url('/')}}/backend/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('/')}}/backend/js/dashboard.js"></script>
    <script src="{{url('/')}}/backend/pace-progress/pace.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $('form').submit(function(event) {
            $(this).find("button[type='submit']").prop('disabled',true);
        });
    </script>
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#date').daterangepicker({
                singleDatePicker: true,
                autoUpdateInput: false,
                // showDropdowns : true,
                startDate : true,
            locale:{
                format: 'YYYY/MM/DD',
                cancleLabel: 'clear',
            },
        }).on("apply.daterangepicker", function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format));
    });
        $('#date1').daterangepicker({
                singleDatePicker: true,
                autoUpdateInput: false,
                // showDropdowns : true,
                startDate : true,
            locale:{
                format: 'YYYY/MM/DD',
                cancleLabel: 'clear',
            },
        }).on("apply.daterangepicker", function (e, picker) {
        picker.element.val(picker.startDate.format(picker.locale.format));
    });
    $('.modal').modal({
        show:false,
        keyboard: true,
        backdrop: 'static'
    });
});
</script>
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
<script>
  function myFunction() {
      if(!confirm(" Danger!!!! Are You Sure to delete this??"))
      event.preventDefault();
  }
 </script>

</body>
</html>