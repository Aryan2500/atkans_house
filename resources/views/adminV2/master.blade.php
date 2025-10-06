<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ env('APP_NAME') }} | Admin Panel</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('v2/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('v2/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('v2/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('v2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('v2/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('v2/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('v2/dist/css/adminlte.min.css?v=3.2.0') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('v2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('v2/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('v2/plugins/summernote/summernote-bs4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('v2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('v2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('v2/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('adminV2.partials.loader')


        @include('adminV2.partials.sidenav')

        @include('adminV2.partials.topbar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            {{-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $header }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div> --}}
            <!-- /.content-header -->

            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </section>
        </div>
        <!-- /.content-wrapper -->

        @include('adminV2.partials.footer')


        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('v2/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('v2/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('v2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('v2/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('v2/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('v2/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('v2/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('v2/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('v2/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('v2/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('v2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('v2/dist/js/adminlte.js?v=3.2.0') }}"></script>

    <script src="{{ asset('v2/dist/js/pages/dashboard.js') }}"></script>

    {{-- <script src="{{ asset('v2/plugins/jquery-validation/jquery.validate.min.js') }}"></script> --}}
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <script src="{{ asset('v2/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('v2/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/js/home.script.js') }}"></script>
    <script src="{{ asset('v2/dist/js/datatables-init.js') }}"></script>

    @stack('scripts')


</body>

</html>
