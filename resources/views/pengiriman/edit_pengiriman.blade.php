@extends('layout.main')
@section('title', 'Edit Pengiriman')


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
                    <a href="{{route('pengiriman.index')}}">Pengiriman</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pengiriman</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pengiriman</h4>
                        </div>
                    </div>
                    <form id="shippingForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Nama Pembeli</label>
                                        <input type="text" class="form-control form-control" id="namaPembeli" name="namaPembeli" value="{{$pengiriman->nama_pembeli}}">
                                    </div>
                                </div>
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamatPembeli" name="alamatPembeli" value="{{$pengiriman->alamat_pembeli}}">
                                    </div>
                                </div>
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="text" class="form-control form-control" id="phonePembeli" name="alamatPembeli" value="{{$pengiriman->phone}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" id="tglPengiriman" name="tglPengiriman" value="{{$pengiriman->tanggal_pengiriman}}">
                                    </div>
                                </div>
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Prioritas Pengiriman</label>
                                        <select class="form-control" name="prioritas">
                                            <option value="penting" {{$pengiriman->prioritas == 'penting' ? 'selected' : ''}}>Penting</option>
                                            <option value="sedang" {{$pengiriman->prioritas == 'sedang' ? 'selected' : ''}}>Sedang</option>
                                            <option value="normal" {{$pengiriman->prioritas == 'normal' ? 'selected' : ''}}>Normal</option>
                                        </select>
                                    </div>
                                </div>
                                @isset($pengiriman->driver_id)
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Driver</label>
                                        <select class="form-control" name="driver">
                                            @foreach ($drivers as $driver)
                                            <option value="{{$driver->id}}" {{$driver->id == $pengiriman->driver_id ? 'selected' : ''}}>{{$driver->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endisset
                                @isset($pengiriman->uk_kendaraan)
                                <div class="col-sm-3 pr-0">
                                    <div class="form-group">
                                        <label>Uk. Kendaraan</label>
                                        <select class="form-control" name="kendaraan">
                                            <option value="besar" {{$pengiriman->uk_kendaraan == 'besar' ? 'selected' : ''}}>Besar</option>
                                            <option value="kecil" {{$pengiriman->uk_kendaraan == 'kecil' ? 'selected' : ''}}>Kecil</option>
                                        </select>
                                    </div>
                                </div>
                                @endisset
                            </div>
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahModal">
                                            <i class="fa fa-plus"></i>
                                            Tambah Item
                                        </span>
                                    </div>
                                </div>
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
                                                    <th style="width: 10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($pengiriman->items as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->product->nama_produk}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{$item->unit->name_unit}}</td>
                                                    <td>{{$item->unit_price}}</td>
                                                    <td>{{$item->total}}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                        <div class="dropdown-menu">
                                                            <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal" data-row="{{$loop->iteration}}">Edit</span>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="{{$loop->iteration}}">Hapus</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                                                    <td><b><span id="grandTotal">{{$pengiriman->grandtotal}}</span></b></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
                <form id="tambahItem">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Item</label>
                                <input type="text" class="form-control form-control" id="namaItem" autofocus>
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
                                <small class="form-text text-muted">Contoh Unit : Sak, Kg, Meter</small>
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
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan" data-dismiss="modal" disabled>Simpan</button>
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
            <form action="{{url('/')}}">
                <div class="modal-body">
                    <input type="hidden" id="idItemEdit">
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
                                <input type="hidden" id="totalItemEditHidden">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button class="btn btn-success" id="simpanEdit" data-dismiss="modal">Simpan</button>
                </div>
            </form>
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
                <p>Yakin untuk menghapus item ini ?</p>
                <input type="hidden" id="hapusItemId">
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" id="hapusItemBtn" class="btn btn-success" data-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>

<script>
    $(document).ready(function() {
        var listItem = $('#daftarItem').DataTable({
            "pageLength": 10,
            "columns": [{
                    "data": "nomor"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "jumlahItem"
                },
                {
                    "data": "unitItem"
                },
                {
                    "data": "hargaItem"
                },
                {
                    "data": "totalItem"
                },
                {
                    "data": "action"
                }
            ]

        });



        var counter = listItem.rows().data().length + 1;
        $('#simpan').click(function() {
            dataItem = listItem.rows().data();


            let data = {
                'nomor': counter,
                'nama': $('#namaItem').val(),
                'jumlahItem': $('#jumlahItem').val(),
                'unitItem': $('#unitItem').val(),
                'hargaItem': $('#hargaItem').val(),
                'totalItem': $('#totalItem').val(),
                'action': `<button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>\
                                                            <div class="dropdown-menu">\
                                                            <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal"  data-row="${counter}">Edit</span>\
                                                            <div role="separator" class="dropdown-divider"></div>\
                                                            <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="${counter}">Hapus</span>\
                                                        </div>`
            };

            listItem.row.add(data).draw();
            $('#submitShipping').removeAttr("disabled");

            $('#grandTotal').html(parseInt($('#grandTotal').html()) + parseInt($('#totalItem').val()));


            counter++;
            $('#tambahModal').modal('toggle');
            $('#simpan').attr("disabled", "disabled");
            $('#tambahItem').trigger('reset');

        });

        $('.modal').on('shown.bs.modal', function() {
            $(this).find('[autofocus]').focus();
        });

        $('#daftarItem').on('click', '.editDaftarItem', function() {
            index = parseInt($(this).data('row')) - 1;
            let row = $('#daftarItem').DataTable().row(index).data();

            $('#idItemEdit').val(index);
            $('#namaItemEdit').val(row.nama);
            $('#jumlahItemEdit').val(row.jumlahItem);
            $('#unitItemEdit').val(row.unitItem);
            $('#hargaItemEdit').val(row.hargaItem);
            $('#totalItemEdit').val(row.totalItem);
            $('#totalItemEditHidden').val(row.totalItem)

        });

        $('#simpanEdit').click(function(e) {
            e.preventDefault();
            id = parseInt($('#idItemEdit').val());
            temp = listItem.row(id).data();
            temp.nama = $('#namaItemEdit').val();
            temp.jumlahItem = $('#jumlahItemEdit').val();
            temp.unitItem = $('#unitItemEdit').val();
            temp.hargaItem = $('#hargaItemEdit').val();
            temp.totalItem = $('#totalItemEdit').val();
            listItem.row(id).data(temp);

            grandtotal = parseInt($('#grandTotal').html());
            newgrandTotal = (grandtotal - parseInt($('#totalItemEditHidden').val())) + parseInt($('#totalItemEdit').val());
            $('#grandTotal').html(newgrandTotal);

        })

        $('#submitShipping').click(function(event) {
            event.preventDefault();
            swalLoading();

            var sale = $('#shippingForm').serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});
            sale['grandTotal'] = parseInt($('#grandTotal').html());
            sale['dataItem'] = [];

            dataItem = listItem.rows().data();

            for (let i = 0; i < dataItem.length; i++) {
                sale['dataItem'].push(dataItem[i]);
            }


            $.ajax({
                data: sale,
                url: "{!!  route('pengiriman.edit',['pengiriman'=>$pengiriman->id]) !!}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    swal.close();
                    swalSuccess('Edit data pengiriman berhasil');
                    window.location.href = "{!!route('pengiriman.index')!!}";
                },
                error: function(data) {
                    swalError('Error,tidak dapat menambah data');

                }
            });

        });

        //tampil modal konfirmasi
        $('#daftarItem').on('click', '.hapusDaftarItem', function() {
            $('#hapusItemId').val($(this).data('row'));
        });

        $('#hapusItemBtn').click(function() {
            row = parseInt($('#hapusItemId').val()) - 1;

            deletedRow = $('#daftarItem').DataTable().row(row).data();
            grandtotal = parseInt($('#grandTotal').html());
            newgrandTotal = (grandtotal - parseInt(deletedRow.totalItem));
            $('#grandTotal').html(newgrandTotal);

            $('#daftarItem').DataTable().row(row).remove().draw();

            dataItem = $('#daftarItem').DataTable().rows().data();
            for (let index = 0; index < dataItem.length; index++) {

                dataItem[index].nomor = index + 1;
                dataItem[index].action = `<button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                                <div class="dropdown-menu">
                                                                <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal"  data-row="${index+1}">Edit</span>
                                                                <div role="separator" class="dropdown-divider"></div>
                                                                <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="${index+1}">Hapus</span>
                                                            </div>`;
                $('#daftarItem').DataTable().row(index).data(dataItem[index]);

            }

            if (dataItem.length <= 0) {
                $('#submitShipping').attr("disabled", "disabled");
            }
        });


    });

    $('#namaItem').change(function() {
        if ($(this).val() == "") {
            $('#simpan').attr("disabled", "disabled");
        } else {
            $('#simpan').removeAttr("disabled");

        }
    })

    $('#hargaItem').change(function() {
        if (parseInt($(this).val()) > 0) {
            jumlah = parseInt($('#jumlahItem').val());

            totalItem = jumlah * parseInt($(this).val());
            $('#totalItem').val(totalItem);

        }
    });

    $('#hargaItemEdit').change(function() {
        if (parseInt($(this).val()) > 0) {
            jumlah = parseInt($('#jumlahItemEdit').val());

            totalItem = jumlah * parseInt($(this).val());
            $('#totalItemEdit').val(totalItem);

        }
    });
</script>
@endsection