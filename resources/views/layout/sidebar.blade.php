<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('/assets/img/logo.png')}}" alt="..." class="avatar-img">
                </div>
                <div class="info">
                    <a aria-expanded="true">
                        <span>
                            <span class="user-level">Administrator</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item {{set_active('home')}}">
                    <a href="{{url('/dashboard')}}" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{set_active(['pembelian.index','pembelian.form.tambah','pembelian.riwayat','supplier.index', 'supplier.form.tambah'])}}">
                    <a data-toggle="collapse" href="#pembelian">
                        <i class="fas fa-shopping-cart "></i>
                        <p>Pembelian</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['pembelian.index','pembelian.form.tambah','pembelian.riwayat','supplier.index', 'supplier.form.tambah'])}}" id="pembelian">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('pembelian.form.tambah')}}">
                                <a href="{{route('pembelian.form.tambah')}}">
                                    <span class="sub-item">Tambah Pembelian</span>
                                </a>
                            </li>
                            <li class="{{set_active('pembelian.index')}}">
                                <a href="{{route('pembelian.index')}}">
                                    <span class="sub-item">Pembelian Aktif</span>
                                </a>
                            </li>
                            <li class="{{set_active('pembelian.riwayat')}}">
                                <a href="{{route('pembelian.riwayat')}}">
                                    <span class="sub-item">Riwayat Pembelian</span>
                                </a>
                            </li>
                            <li class="{{set_active('supplier.index')}}">
                                <a href="{{route('supplier.index')}}">
                                    <span class="sub-item">Daftar Supplier</span>
                                </a>
                            </li>
                            <li class="{{set_active('supplier.form.tambah')}}">
                                <a href="{{route('supplier.form.tambah')}}">
                                    <span class="sub-item">Tambah Supplier</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item {{set_active(['supplier.index','supplier.form.tambah','sales.index','sales.form.tambah'])}}">
                    <a data-toggle="collapse" href="#supplier">
                        <i class="fas fa-users"></i>
                        <p>Supplier</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['supplier.index','supplier.form.tambah','sales.index','sales.form.tambah'])}}" id="supplier">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('supplier.index')}}">
                                <a href="{{route('supplier.index')}}">
                                    <span class="sub-item">Daftar Supplier</span>
                                </a>
                            </li>
                            <li class="{{set_active('supplier.form.tambah')}}">
                                <a href="{{route('supplier.form.tambah')}}">
                                    <span class="sub-item">Tambah Supplier</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item {{set_active(['penjualan.index','penjualan.form.tambah'])}}">
                    <a data-toggle="collapse" href="#penjualan">
                        <i class="fas fa-chart-bar"></i>
                        <p>Penjualan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['penjualan.index','penjualan.form.tambah'])}}" id="penjualan">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('penjualan.index')}}">
                                <a href="{{url('penjualan')}}">
                                    <span class="sub-item">Daftar Penjualan</span>
                                </a>
                            </li>
                            <li class="{{set_active('penjualan.form.tambah')}}">
                                <a href="{{url('penjualan/create')}}">
                                    <span class="sub-item">Tambah Penjualan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <!-- <li class="nav-item {{set_active(['driver.index','driver.form.tambah'])}}">
                    <a data-toggle="collapse" href="#driver">
                        <i class="fas fa-user-tie"></i>
                        <p>Driver</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['driver.index','driver.form.tambah'])}}" id="driver">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('driver.index')}}">
                                <a href="{{route('driver.index')}}">
                                    <span class="sub-item">Daftar Driver</span>
                                </a>
                            </li>
                            <li class="{{set_active('driver.form.tambah')}}">
                                <a href="{{route('driver.form.tambah')}}">
                                    <span class="sub-item">Tambah Driver</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="nav-item {{set_active(['pengiriman.index','pengiriman.riwayat','pengiriman.form.tambah','driver.index', 'driver.form.tambah'])}}">
                    <a data-toggle="collapse" href="#pengiriman">
                        <i class="fas fa-shipping-fast"></i>
                        <p>Pengiriman</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['pengiriman.index','pengiriman.riwayat','pengiriman.form.tambah', 'driver.index', 'driver.form.tambah'])}}" id="pengiriman">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('pengiriman.form.tambah')}}">
                                <a href="{{route('pengiriman.form.tambah')}}">
                                    <span class="sub-item">Tambah Pengiriman</span>
                                </a>
                            </li>
                            <li class="{{set_active('pengiriman.index')}}">
                                <a href="{{route('pengiriman.index')}}">
                                    <span class="sub-item">Pengiriman Aktif</span>
                                </a>
                            </li>
                            <li class="{{set_active('pengiriman.riwayat')}}">
                                <a href="{{route('pengiriman.riwayat')}}">
                                    <span class="sub-item">Riwayat Pengiriman</span>
                                </a>
                            </li>
                            <li class="{{set_active('driver.index')}}">
                                <a href="{{route('driver.index')}}">
                                    <span class="sub-item">Daftar Driver</span>
                                </a>
                            </li>
                            <li class="{{set_active('driver.form.tambah')}}">
                                <a href="{{route('driver.form.tambah')}}">
                                    <span class="sub-item">Tambah Driver</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{set_active(['kendaraan.index', 'kendaraan.form.tambah'])}}">
                    <a data-toggle="collapse" href="#kendaraan">
                        <i class="fas fa-truck"></i>
                        <p>Kendaraan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['kendaraan.index', 'kendaraan.form.tambah'])}}" id="kendaraan">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('kendaraan.index')}}">
                                <a href="{{route('kendaraan.index')}}">
                                    <span class="sub-item">Daftar Kendaraan</span>
                                </a>
                            </li>
                            <li class="{{set_active('kendaraan.form.tambah')}}">
                                <a href="{{route('kendaraan.form.tambah')}}">
                                    <span class="sub-item">Tambah Kendaraan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>