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
                <li class="nav-item {{set_active(['pembelian.index','pembelian.non.aktif','pembelian.form.tambah'])}}">
                    <a data-toggle="collapse" href="#pembelian">
                        <i class="fas fa-shopping-cart "></i>
                        <p>Pembelian</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['pembelian.index','pembelian.non.aktif','pembelian.form.tambah',])}}" id="pembelian">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('pembelian.index')}}">
                                <a href="{{route('pembelian.index')}}">
                                    <span class="sub-item">Daftar Pembelian Aktif</span>
                                </a>
                            </li>
                            <li class="{{set_active('pembelian.non.aktif')}}">
                                <a href="{{route('pembelian.non.aktif')}}">
                                    <span class="sub-item">Daftar Pembelian Non Aktif</span>
                                </a>
                            </li>
                            <li class="{{set_active('pembelian.form.tambah')}}">
                                <a href="{{url('pembelian/create')}}">
                                    <span class="sub-item">Tambah Pembelian</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item {{set_active(['supplier.index','supplier.form.tambah','sales.index','sales.form.tambah'])}}">
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
                </li>
                <li class="nav-item {{set_active(['penjualan.index','penjualan.form.tambah'])}}">
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
                </li>
                <li class="nav-item {{set_active(['pengiriman.index','pengiriman.form.tambah'])}}">
                    <a data-toggle="collapse" href="#pengiriman">
                        <i class="fas fa-shipping-fast"></i>
                        <p>Pengiriman</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['pengiriman.index','pengiriman.form.tambah'])}}" id="pengiriman">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('pengiriman.index')}}">
                                <a href="{{route('pengiriman.index')}}">
                                    <span class="sub-item">Daftar Pengiriman</span>
                                </a>
                            </li>
                            <li class="{{set_active('driver.index')}}">
                                <a href="{{route('driver.index')}}">
                                    <span class="sub-item">Daftar Supir</span>
                                </a>
                            </li>
                            <li class="{{set_active('driver.form.tambah')}}">
                                <a href="{{route('driver.form.tambah')}}">
                                    <span class="sub-item">Tambah Supir</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>