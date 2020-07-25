@extends('layout.main')
@section('title', 'Edit Pembayaran')


@section('contain')

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
                    <a href="#">Pembayaran</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pembayaran</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pembayaran</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('pembayaran.update', $payment->id)}}">
                        @method ('GET')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" name="tglPembayaranEdit" id="tglPembayaranEdit" value="{{$payment->payment_date}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah yang Harus Dibayar</label>
                                        <input type="text" class="form-control form-control" value="{{$new_bill}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pembayaran</label>
                                        <input type="number" class="form-control form-control" name="jmlPembayaranEdit" id="jmlPembayaranEdit" value="{{$payment->amount}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection