<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <script src="{{asset('/assets/js/plugin/webfont/webfont.min.js')}}">
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

    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/assets/css/atlantis.min.css')}}">

</head>

<body>
    <div class="wrapper">
        @yield('form')
    </div>

</body>

</html>