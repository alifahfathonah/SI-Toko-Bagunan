@extends('layout.main')
@section('title', 'Tambah Pengiriman')


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
                    <a href="{{route('pembelian.index')}}">Pengiriman</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Pengiriman</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pengiriman</h4>
                        </div>
                    </div>
                    <form id="shippingForm" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 pr-0">
                                    <input type="hidden" id="id_penjualan" name="id_penjualan" value="{{$penjualan->id}}">
                                    <div class="form-group">
                                        <label>Nama Pembeli</label>
                                        <input type="text" class="form-control form-control" id="namaPembeli" name="namaPembeli" value="{{$penjualan->nama_pembeli}}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>ALamat</label>
                                        <input type="text" class="form-control form-control" id="alamat" name="alamat" value="{{$penjualan->alamat_pembeli}}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 pr-0">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" id="tglPengiriman" name="tglPengiriman">
                                    </div>
                                </div>
                                <div class="col-sm-6 pr-0">
                                    <div class="form-group">
                                        <label>Supir</label>
                                        <select class="form-control" id="driver" name="driver">
                                            <option selected disabled>--Pilih Supir--</option>
                                            @foreach($drivers as $driver)
                                            <option value="{{$driver->id}}">{{$driver->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Daftar Item</h4>
                                    </div>
                                </div><br>
                                <div class="table-responsive">
                                    <table id="daftarItemPenjualan" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Item</th>
                                                <th>Jumlah Dibeli</th>
                                                <th>Jumlah Dikirim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($penjualanItem as $penjualan)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$penjualan->product->nama_produk}}</td>
                                                <td>{{$penjualan->quantity}}</td>
                                                <td><input type="number" class="form-control form-control" id="jmlDikirim" name="jmlDikirim"></input></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                            <button type="submit" class="btn btn-success" id="submitShipping">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {

        $('#daftarItemPenjualan').DataTable({
            "pageLength": 5,
        });

        $('#submitShipping').click(function() {
            // event.preventDefault();

            var shipping = $('#shippingForm').serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});

            shipping['dataItem'] = [];

            var getTable = document.getElementById('daftarItemPenjualan');
            for (let i = 1; i < getTable.rows.length; i++) {
                var oCells = getTable.rows.item(i).cells;

                for (let j = 1; j < oCells.lengt - 1; j++) {
                    var cellVal = oCells.item(j).innerHTML;
                    // alert(cellVal);
                    shipping['dataItem'].push(cellVal);
                }
                shipping['dataItem'].push($("#jmlDikirim").val());
            }

            // dataItem = listItem.rows().data();

            // for (let i = 1; i < dataItem.length - 1; i++) {
            //     shipping['dataItem'].push(dataItem[i]);
            //     shipping['dataItem'].push($("#jmlDikirim").val());
            // }

            $.ajax({
                data: shipping,
                url: "{{route('pengiriman.tambah')}}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    // swal.close();
                    // swal("Sukses!", "Tambah data pembelian sukses 😀", {
                    //     buttons: {
                    //         confirm: {
                    //             className: 'btn btn-success'
                    //         }
                    //     },
                    // });
                    window.location.href = "{{route('pengiriman.index')}}";
                },
                error: function(data) {
                    console.log('Error:', "error insert data");

                }
            });

            // var getTable = document.getElementById('daftarItemPenjualan');
            // var listItem = [];
            // for (let i = 1; i < getTable.rows.length; i++) {
            //     var oCells = getTable.rows.item(i).cells;

            //     for (let j = 1; j < oCells.lengt - 1; j++) {
            //         var cellVal = oCells.item(j).innerHTML;
            //         alert(cellVal);
            //     }
            //     alert($("#jmlDikirim").val());
            // }
        });
    });
</script>
@endsection