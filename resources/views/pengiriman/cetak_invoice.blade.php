@extends('layout.main')
@section('title', 'Surat Jalan')

@section('contain')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pengiriman</h4>
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
                    <a href="{{url('pengiriman/daftar')}}">Pengiriman</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Surat Jalan</a>
                </li>
            </ul>
        </div>
        <div id="print" class="col-md-12">
            <div class="card">
                <div class="card card-dark bg-primary-gradient">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 b-b1 pb-2">
                                <h2 class="mt-3 pb-2 fw-bold">SURAT JALAN</h2>
                            </div>
                            <div class="col-md-6 b-b1 pb-2 text-right">
                                <h4 class="mt-3 fw-bold text-right">UD. SUMBER REJEKI</h4>
                                <p class="mb-0">Perum Graha Mentari, Blok A1 No. 10</p>
                                <p class="mb-0">Mlajah 69116</p>
                                <p class="mb-0">Bangkalan - Madura</p>
                                <p class="mb-0">Telp. 0853-3420-0338</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 pb-1 text-left">
                                <p class="mb-0 fw-bold">Tanggal</p>
                                <p class="mb-0">{{$shipping->tanggal_pengiriman}}</p>
                            </div>
                            <div class="col-md-4 pb-1 text-left">

                            </div>
                            <div class="col-md-4 pb-1 text-left">
                                <p class="mb-0 fw-bold">Penerima</p>
                                <p class="mb-0">{{$shipping->nama_pembeli}}</p>
                                <p class="mb-0">{{$shipping->alamat_pembeli}}</p>
                                <p class="mb-0">Telp. {{$shipping->phone}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" style="height:40px; width:20px;">No.</th>
                                <th scope="col" style="height:40px;">Nama Produk</th>
                                <th scope="col" style="height:40px;">Jumlah</th>
                                <th scope="col" style="height:40px;">Unit</th>
                                <th scope="col" style="height:40px;">Harga (Rp)</th>
                                <th scope="col" style="height:40px;">Total (Rp)</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $grandTotal = 0;
                            @endphp

                            @foreach($shippingItem as $item)

                            @php
                            $grandTotal = $grandTotal + ($item->quantity * $item->unit_price);
                            @endphp

                            <tr>
                                <td class="text-center" style="height:30px;">{{$loop->iteration}}</td>
                                <td style="height:30px;">{{$item->product->nama_produk}}</td>
                                <td class="text-right" style="height:30px;">{{$item->quantity}}</td>
                                <td class="text-center" style="height:30px;">{{$item->unit->name_unit}}</td>
                                <td class="text-right" style="height:30px;">{{number_format($item->unit_price, 2)}}</td>
                                <td class="text-right" style="height:30px;">{{number_format($item->quantity * $item->unit_price, 2)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="text-center" colspan="5" style="height:30px;"><b>Total</b></td>
                                <td class="text-right" style="height:30px;"><b>{{number_format($grandTotal, 2)}}</b></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row" style="padding-top: 50px; padding-bottom:30px;">
                        <!-- <div class="col-md-2">
                                <p class="text-center" style="height: 70px;">Dibuat Oleh :</p>
                                <div role="separator" class="dropdown-divider"></div>
                            </div> -->
                        <div class="col-md-2">
                            <p class="text-center" style="height: 70px;">Dikirim Oleh :</p>
                            <div role="separator" class="dropdown-divider"></div>
                            <p class="text-center" style="height: 70px;">{{@$shipping->driver->name??'-'}}</p>
                        </div>
                        <div class="col-md-2">
                            <p class="text-center" style="height: 70px;">Diterima Oleh :</p>
                            <div role="separator" class="dropdown-divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right" style="padding-right: 20px;">
            <a href="{{route('pengiriman.index')}}" class="btn btn-danger">Batal</a>&nbsp;
            <a class="btn btn-success" style="color: #fff;" onclick="cetak()">Cetak</a>
        </div>
    </div>
</div>

@endsection

@section('script')
<script type="text/javascript">
    function cetak() {
        var printContents = document.getElementById('print').innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
@endsection