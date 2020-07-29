@extends('layout.main')
@section('title', 'Edit Supplier')


@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Supplier</h4>
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
                    <a href="{{route('supplier.index')}}">Supplier</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Supplier</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Supplier</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('supplier.update', $supplier->id)}}">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" name="namaSupplierEdit" id="namaSupplierEdit" value="{{$supplier->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" name="phoneSupplierEdit" id="phoneSupplierEdit" value="{{$supplier->phone}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" name="alamatSupplierEdit" id="alamatSupplierEdit" value="{{$supplier->address}}">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control" name="provSupplierEdit" id="provSupplierEdit">
                                            <option value="{{$prov->id_prov}}"></option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-control" name="kotaSupplierEdit" id="kotaSupplierEdit">
                                            <option value="{{$kab->id_kab}}"></option>
                                        </select>
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

@section('script')
<script>
    $(document).ready(function() {

        $('#provSupplierEdit').change(function() {
            $('#kotaSupplierEdit').empty().append(
                '<option selected disabled>- Pilih Kabupaten -</option>'
            );

            let url = `/lokasi/provinsi/${$(this).val()}/kabupaten`;

            $.get(url, function(data, status) {
                data.forEach(function(item, index) {
                    $('#kotaSupplierEdit').append(
                        `<option value="${item.id_kab}"> ${item.nama} </option>`);
                });
            });
        });

        if ($('#provSupplierEdit').val() !== null) {
            var id_prov = $('#provSupplierEdit').val();

            $('#provSupplierEdit').empty().append(
                '<option selected disabled>- Pilih Provinsi -</option>'
            );
            $.get("/lokasi/provinsi", function(data, status) {
                data.forEach(function(item, index) {

                    if (item.id_prov == id_prov) {
                        $('#provSupplierEdit').append(
                            `<option value="${item.id_prov}" selected> ${item.nama} </option>`
                        );
                    } else {
                        $('#provSupplierEdit').append(
                            `<option value="${item.id_prov}"> ${item.nama} </option>`
                        );
                    }
                });
            });
        } else {
            $.get("/lokasi/provinsi", function(data, status) {
                data.forEach(function(item, index) {
                    $('#provSupplierEdit').append(
                        `<option value="${item.id_prov}"> ${item.nama} </option>`);
                });
            });
        }

        if ($('#kotaSupplierEdit').val() !== null) {
            var id_kab = $('#kotaSupplierEdit').val();

            $('#kotaSupplierEdit').empty().append(
                '<option selected disabled>- Pilih Kabupaten -</option>'
            );
            let url = `/lokasi/provinsi/${id_prov}/kabupaten`;
            $.get(url, function(data, status) {
                data.forEach(function(item, index) {

                    if (item.id_kab == id_kab) {
                        $('#kotaSupplierEdit').append(
                            `<option value="${item.id_kab}" selected> ${item.nama} </option>`
                        );
                    } else {
                        $('#kotaSupplierEdit').append(
                            `<option value="${item.id_kab}"> ${item.nama} </option>`
                        );
                    }
                });
            });
        }
    });
</script>
@endsection