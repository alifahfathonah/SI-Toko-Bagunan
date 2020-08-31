@extends('layout.main')
@section('title', 'Detail Pembelian')


@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pembelian</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('pembelian.index')}}">Pembelian</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Pembelian</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Pembelian</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-5 pr-0">
                                <div class="form-group">
                                    <label>Nomor Refrensi</label>
                                    <input type="text" class="form-control form-control" name="nomorRefrensi" value="{{$purchase->reference_no}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 pr-0">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control form-control" id="tglPembelian" name="tglPembelian" value="{{$purchase->purchase_date}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-5 pr-0">
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <select class="form-control" id="supplier" name="supplier" disabled>
                                        <option>--Pilih Supplier</option>
                                        <option value="{{$purchase->supplier_id}}" selected>{{$purchase->supplier->name}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 pr-0">
                                <div class="form-group">
                                    <label>Status Pembayaran</label>
                                    <select class="form-control" id="status" name="paymentStatus" disabled>
                                        <option {{$purchase->payment_status == 'lunas'? 'selected' : '' }}>Lunas</option>
                                        <option {{$purchase->payment_status == 'sebagian'? 'selected' : '' }}>Sebagian</option>
                                        <option {{$purchase->payment_status == 'belum'? 'selected' : '' }}>Belum</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-5 pr-0">
                                <div class="form-group">
                                    <label>Jumlah yang Dibayarkan</label>
                                    <input type="text" class="form-control form-control" id="jmlBayar" name="jmlBayar" value="{{number_format($purchase->paid_amount, 2)}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            {{-- <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <a href="{{route('pembayaran.list', $purchase->id)}}" class="btn btn-primary btn-round ml-auto">Lihat Daftar Pembayaran</a>
                        </div>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarItem" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Item</th>
                                        <th>Jumlah</th>
                                        <th>Unit</th>
                                        <th>Harga Satuan</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchase->purchase_items as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->unit->name_unit}}</td>
                                        <td>{{number_format($item->unit_price, 2)}}</td>
                                        <td>{{number_format($item->total, 2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: center;"><b>Total</b></td>
                                        <td><b><span id="grandTotal">{{number_format($purchase->total, 2)}}</span></b></td>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <h4 class="card-title">Detail Pembayaran</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="daftarPembayaran" class="display table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama Sales</th>
                                <th>Telephone</th>
                                <th>Jumlah</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $payment)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$payment->payment_date}}</td>
                                <td>{{$payment->sales_name}}</td>
                                <td>{{$payment->sales_phone}}</td>
                                <td>{{number_format($payment->amount, 2)}}</td>
                                <td>
                                    <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('pembayaran.edit', ['id' => $payment->id, 'purchase_id' => $payment->purchase_id])}}">Edit</a>
                                        <div role="separator" class="dropdown-divider"></div>
                                        <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$payment->id}}">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
                <a href="{{route('pembelian.index')}}" class="btn btn-info">Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('modal')
<!-- Tambal Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Tambah Data Item</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Item</label>
                            <input type="text" class="form-control form-control" id="namaItem">
                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control form-control" id="jumlahItem">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" class="form-control form-control" id="unitItem">
                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <div class="form-group">
                            <label>Harga Satuan</label>
                            <input type="text" class="form-control form-control" id="hargaItem" value="0">
                            <small id="hargahelp" class="form-text text-muted">Kosongi jika tidak ada harga satuan</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" class="form-control form-control" id="totalItem">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan" data-dismiss="modal">Simpan</button>
            </div>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Data Item</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Nama Item</label>
                            <input type="text" class="form-control form-control" id="namaItemEdit">
                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" class="form-control form-control" id="jumlahItemEdit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Unit</label>
                            <input type="text" class="form-control form-control" id="unitItemEdit">

                        </div>
                    </div>
                    <div class="col-md-6 pr-0">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control form-control" id="hargaItemEdit">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" class="form-control form-control" id="totalItemEdit">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>

        </div>
    </div>
</div>
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data Item</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin untuk menghapus data ini ?</p>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Hapus</button>
            </div>

        </div>
    </div>
</div>

@endsection


@section('script')
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#daftarItem').DataTable();

        $('#daftarPembayaran').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection