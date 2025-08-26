<!DOCTYPE html>
<html lang="en">
<!-- START: Head-->


<head>
    <meta charset="UTF-8">
    <title>Atkans Admin</title>
    <link rel="shortcut icon" href="dist/images/favicon.ico" />
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- START: Template CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-ui/jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/flags-icon/css/flag-icon.min.css') }}">
    <!-- END Template CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/lineprogressbar/jquery.lineProgressbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/ionicons/css/ionicons.min.css') }}">
    <!-- END: Page CSS-->

    <!-- START: Page CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/morris/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/weather-icons/css/pe-icon-set-weather.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/chartjs/Chart.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/starrr/starrr.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.css') }}">
    <!-- END: Page CSS-->
    <link rel="stylesheet" href="{{ asset('dist/vendors/datatable/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('dist/vendors/datatable/buttons/css/buttons.bootstrap4.min.css') }}" />

    <!-- START: Custom CSS-->
    <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}">
    <!-- END: Custom CSS-->
    @stack('styles')
    <!-- END: Custom CSS-->


</head>
<!-- END Head-->

<!-- START: Body-->

<body id="main-container" class="default d-flex flex-column min-vh-100">
    <!-- START: Pre Loader -->
    <div class="se-pre-con">
        <div class="loader"></div>
    </div>
    <!-- END: Pre Loader -->

    @include('admin.partials.topbar')

    <div class="d-flex flex-grow-1">
        @include('admin.partials.sidenav')

        <!-- START: Main Content-->
        <main class="flex-grow-1 px-3 py-4">
            <div class="container-fluid site-width">
                @yield('content')
            </div>
        </main>
        <!-- END: Content-->
    </div>

    <!-- START: Footer -->
    @include('admin.partials.footer')
    <!-- END: Footer -->

    <!-- Scroll to Top -->
    <a href="#" class="scrollup text-center"><i class="icon-arrow-up"></i></a>

    <!-- All JS scripts remain unchanged -->


    <!-- START: Back to top-->
    <a href="#" class="scrollup text-center">
        <i class="icon-arrow-up"></i>
    </a>
    <!-- END: Back to top-->


    <!-- START: Template JS-->
    <script src="{{ asset('dist/vendors/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/moment/moment.js') }}"></script>
    <script src="{{ asset('dist/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- END: Template JS-->

    <!-- START: APP JS-->
    <script src="{{ asset('dist/js/app.js') }}"></script>
    <!-- END: APP JS-->

    <!-- START: Page Vendor JS-->
    <script src="{{ asset('dist/vendors/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/morris/morris.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/starrr/starrr.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.canvaswrapper.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.colorhelpers.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.saturated.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.browser.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.drawSeries.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.uiConstants.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.legend.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('dist/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-de-merc.js') }}"></script>
    <script src="{{ asset('dist/vendors/jquery-jvectormap/jquery-jvectormap-us-aea.js') }}"></script>
    <script src="{{ asset('dist/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/lineprogressbar/jquery.lineProgressbar.js') }}"></script>
    <script src="{{ asset('dist/vendors/lineprogressbar/jquery.barfiller.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Vendor JS-->
    <script src="{{ asset('dist/vendors/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dist/vendors/datatable/buttons/js/buttons.print.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- START: Page Script JS-->
    <script src="{{ asset('dist/js/datatable.script.js') }}"></script>
    <script src="{{ asset('js/datatables-init.js') }}"></script>

    <!-- END: Page Script JS-->


    <!-- START: Page JS-->
    <script src="{{ asset('dist/js/home.script.js') }}"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->

    @stack('scripts')
</body>



<!-- END: Body-->


</html>
