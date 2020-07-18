<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{url('/assets/img/icon.ico')}}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{url('/assets/js/plugin/webfont/webfont.min.js')}}">
    </script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['{{url("/assets/css/fonts.min.css")}}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/assets/css/atlantis.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css"/>
 

</head>

<body>
    <div class="wrapper">

        <!-- Header -->
        @include('layout.header')
        <!-- End Header -->

        <!-- Sidebar -->
        @include('layout.sidebar')
        <!-- End Sidebar -->

        <div class="main-panel">
            <!-- Container -->
            @yield('contain')
            <!-- End Container -->

            <!-- Footer -->
            @include('layout.footer')
            <!-- End Footer -->

        </div>
    </div>

    @yield('modal')

    <!--   Core JS Files   -->
    <script src="{{url('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{url('/assets/js/core/popper.min.js')}}"></script>
    <script src="{{url('/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{url('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{url('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{url('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>
    
    <!-- jQuery Scrollbar -->
    <script src="{{url('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jq-3.3.1/datatables.min.js"></script>
    <!-- Atlantis JS -->
    <script src="{{url('/assets/js/atlantis.min.js')}}"></script>

    @yield('script')

</body>

</html>