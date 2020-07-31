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
                <li class="nav-item" {{set_active('home')}}>
                    <a href="{{url('/dashboard')}}"  aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{set_active(['pembelian.index','pembelian.form.tambah'])}}">
                    <a data-toggle="collapse" href="#pembelian">
                        <i class="fas fa-shopping-cart "></i>
                        <p>Pembelian</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{set_show(['pembelian.index','pembelian.form.tambah'])}}" id="pembelian">
                        <ul class="nav nav-collapse">
                            <li class="{{set_active('pembelian.index')}}">
                                <a href="{{url('pembelian')}}">
                                    <span class="sub-item">Daftar Pembelian</span>
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
                            <li class="{{set_active('sales.index')}}">
                                <a href="{{route('sales.index')}}">
                                    <span class="sub-item">Daftar Sales</span>
                                </a>
                            </li>
                            <li class="{{set_active('sales.form.tambah')}}">
                                <a href="{{route('sales.form.tambah')}}">
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