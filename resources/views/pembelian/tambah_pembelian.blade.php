@extends('layout.main')
@section('title', 'Tambah Pembelian')


@section('container')
<!-- Container -->
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pembelian</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="#">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Pembelian</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Pembelian</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pembelian</h4>
                        </div>
                    </div>
                    <form action="{{url('/')}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" id="tglPembelian">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6 pr-0">
                                            <div class="form-group">
                                                <label>Supplier</label>
                                                <!-- <input type="text" class="form-control form-control" id="supplier"> -->
                                                <select class="form-control" id="supplier">
                                                    <option>--Pilih Supplier</option>
                                                    <option>Dimas</option>
                                                    <option>Icha</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Sales</label>
                                                <!-- <input type="text" class="form-control form-control" id="sales"> -->
                                                <select class="form-control" id="sales">
                                                    <option>--Pilih Sales</option>
                                                    <option>Dimas</option>
                                                    <option>Icha</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Item Pembelian</label>
                                        <input type="text" class="form-control form-control" id="itemPembelian">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jumlah Item</label>
                                        <input type="number" class="form-control form-control" id="jmlPembelian">
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="number" class="form-control form-control" id="hargaPembelian">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Bayar</label>
                                        <input type="number" class="form-control form-control" id="jmlBayar">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@endsection