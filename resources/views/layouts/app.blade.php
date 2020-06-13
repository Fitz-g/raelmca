<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>RAELMCA - @yield('title')</title>
    <meta content="ADMINISTRATION RAELMCA" name="Application de gestion du Réseau des Anciens Etudiants du Lycée Moderne de Cocody Angre." />
    <meta content="Développeur d'applications Web" name="Wilfried KORANDJI" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">

    <!--Chartist Chart CSS -->
{{--    <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.min.css')}}">--}}

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Top Bar Start -->
        @include('includes.topbar')
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('includes.left-sidebar')
        <!-- Left Sidebar End -->


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Page title -->
                    @yield('page-title')
                    <!-- Content -->
                    @yield('content')
                </div>
            </div>
        </div>


                        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>

    <!--Chartist Chart-->
{{--    <script src="{{ asset('plugins/chartist/js/chartist.min.js') }}"></script>--}}
{{--    <script src="{{ asset('plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>--}}

    <!-- peity JS -->
{{--    <script src="{{ asset('plugins/peity-chart/jquery.peity.min.js') }}"></script>--}}

    <script src="{{ asset('assets/pages/dashboard.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>
