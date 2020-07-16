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

</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="blue">
                <a href="index.html" class="logo">
                    <img src="{{url('/assets/img/logo.svg')}}" alt="navbar brand" class="navbar-brand">
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">
                        <i class="icon-menu"></i>
                    </span>
                </button>
                <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
                <div class="nav-toggle">
                    <button class="btn btn-toggle toggle-sidebar">
                        <i class="icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

                <div class="container-fluid">
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                                <div class="avatar-sm">
                                    <img src="{{url('/assets/img/pp.jpg')}}" alt="..." class="avatar-img rounded-circle">
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>
                                        <a class="dropdown-item" href="{{url('ubah_pass')}}"><i class="fas fa-edit"> Ubah Password</i></a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"> Logout</i></a>
                                    </li>
                                </div>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- End Navbar -->
        </div>

        <!-- Sidebar -->
        <div class="sidebar sidebar-style-2">
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <div class="user">
                        <div class="avatar-sm float-left mr-2">
                            <img src="{{url('/assets/img/pp.jpg')}}" alt="..." class="avatar-img rounded-circle">
                        </div>
                        <div class="info">
                            <a aria-expanded="true">
                                <span>
                                    Dimas
                                    <span class="user-level">Administrator</span>
                                </span>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <ul class="nav nav-primary">
                        <li class="nav-item active">
                            <a href="{{url('/')}}" aria-expanded="false">
                                <i class="fas fa-home"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#pembelian">
                                <i class="fas fa-shopping-cart "></i>
                                <p>Pembelian</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="pembelian">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{url('pembelian/daftar')}}">
                                            <span class="sub-item">Daftar Pembelian</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('pembelian/tambah')}}">
                                            <span class="sub-item">Tambah Pembelian</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#supplier">
                                <i class="fas fa-users"></i>
                                <p>Supplier</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="supplier">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{url('/supplier/daftar_supplier')}}">
                                            <span class="sub-item">Daftar Supplier</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/supplier/tambah_supplier')}}">
                                            <span class="sub-item">Tambah Supplier</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/supplier/daftar_sales')}}">
                                            <span class="sub-item">Daftar Sales</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/supplier/tambah_sales')}}">
                                            <span class="sub-item">Tambah Sales</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- <li class="nav-item">
                            <a data-toggle="collapse" href="#barang">
                                <i class="fas fa-box"></i>
                                <p>Barang</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="barang">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="{{url('/barang/daftar')}}">
                                            <span class="sub-item">Daftar Barang</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{url('/barang/tambah')}}">
                                            <span class="sub-item">Tambah Barang</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> -->
                        <li class="nav-item">
                            <a data-toggle="collapse" href="#laporan">
                                <i class="fas fa-file"></i>
                                <p>Laporan</p>
                                <span class="caret"></span>
                            </a>
                            <div class="collapse" id="laporan">
                                <ul class="nav nav-collapse">
                                    <li>
                                        <a href="forms/forms.html">
                                            <span class="sub-item">Pembelian</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms/forms.html">
                                            <span class="sub-item">Supplier</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms/forms.html">
                                            <span class="sub-item">Sales</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="forms/forms.html">
                                            <span class="sub-item">Barang</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Sidebar -->

        <div class="main-panel">
            <!-- Container -->
            @yield('container')
            <!-- End Container -->
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul class="nav">
                            Copyright &copy; 2020</i>
                        </ul>
                    </nav>
                    <div class="copyright ml-auto">
                        Design by Bootstrap
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{url('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{url('/assets/js/core/popper.min.js')}}"></script>
    <script src="{{url('/assets/js/core/bootstrap.min.js')}}"></script>
    <!-- jQuery UI -->
    <script src="{{url('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{url('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

    <!-- jQuery Scrollbar -->
    <script src="{{url('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{url('/assets/js/plugin/datatables/datatables.min.js')}}"></script>
    <!-- Atlantis JS -->
    <script src="{{url('/assets/js/atlantis.min.js')}}"></script>

    @yield('script')

</body>

@yield('modal')

</html>