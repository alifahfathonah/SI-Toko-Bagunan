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
                    <a href="{{url('pengiriman/daftar_pengiriman')}}">Pengiriman</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Surat Jalan</a>
                </li>
            </ul>
        </div>
        <div id="print">
            <div class="col-md-12">
                <div class="card">
                    <div class="card card-dark bg-primary-gradient">
                        <div class="card-body bubble-shadow">
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
                                    <p class="mb-0">08 Agustus 2020</p>
                                </div>
                                <div class="col-md-4 pb-1 text-left">
                                    <p class="mb-0 fw-bold">Nomor</p>
                                    <p class="mb-0">12345</p>
                                </div>
                                <div class="col-md-4 pb-1 text-left">
                                    <p class="mb-0 fw-bold">Penerima</p>
                                    <p class="mb-0">PT. Mencari Cinta Sejati</p>
                                    <p class="mb-0">Jln. Cinta Segitiga</p>
                                    <p class="mb-0">Kamal 69116</p>
                                    <p class="mb-0">Bangkalan - Madura</p>
                                    <p class="mb-0">Telp. 0889-1234-5678</p>
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
                                <tr>
                                    <td class="text-center" style="height:30px;">1</td>
                                    <td style="height:30px;">Besi 10 dim</td>
                                    <td class="text-right" style="height:30px;">10</td>
                                    <td class="text-center" style="height:30px;">Lonjor</td>
                                    <td class="text-right" style="height:30px;">20.000</td>
                                    <td class="text-right" style="height:30px;">200.000</td>
                                </tr>
                                <tr>
                                    <td class="text-center" style="height:30px;">2</td>
                                    <td style="height:30px;">Usuk Jati 5/6</td>
                                    <td class="text-right" style="height:30px;">85</td>
                                    <td class="text-center" style="height:30px;">Buah</td>
                                    <td class="text-right" style="height:30px;">35.000</td>
                                    <td class="text-right" style="height:30px;">2.975.000</td>
                                </tr>
                                <tr>
                                    <td colspan="5" class="text-center" style="height:30px;"><b>Total</b></td>
                                    <td class="text-right" style="height:30px;"><b>3.175.000</b></td>
                                </tr>
                                <tr>
                                    <td style="height:30px;"><b>Terbilang</b></td>
                                    <td colspan="5" style="height:30px;"><b>: Tiga Juta Seratus Tujuh Puluh Lima Ribu Rupiah</b></td>
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
                            </div>
                            <div class="col-md-2">
                                <p class="text-center" style="height: 70px;">Diterima Oleh :</p>
                                <div role="separator" class="dropdown-divider"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right" style="padding-right: 20px;">
            <a href="{{url('/pengiriman/daftar')}}" class="btn btn-danger">Batal</a>&nbsp;
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