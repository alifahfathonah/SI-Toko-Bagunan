@extends('layout.main')
@section('title', 'Tambah Supplier')


@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Supplier</h4>
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
                    <a href="{{route('supplier.index')}}">Supplier</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Supplier</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Supplier</h4>
                        </div>
                    </div>
                    <form action="{{route('supplier.tambah')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namaSupplier" name="namaSupplier" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" id="phoneSupplier" name="phoneSupplier">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamatSupplier" name="alamatSupplier">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control" id="provSupplier" name="provSupplier">

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-control" id="kotaSupplier" name="kotaSupplier">

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('supplier.index')}}" class="btn btn-danger">Batal</a>&nbsp;
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
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

        $('#provSupplier').change(function() {
            $('#kotaSupplier').empty().append(
                '<option selected disabled>- Pilih Kabupaten -</option>'
            );

            let url = `/lokasi/provinsi/${$(this).val()}/kabupaten`;

            $.get(url, function(data, status) {
                data.forEach(function(item, index) {
                    $('#kotaSupplier').append(
                        `<option value="${item.id_kab}"> ${item.nama} </option>`);
                });
            });
        });

        if ($('#provSupplier').val() !== null) {
            var id_prov = $('#provSupplier').val();

            $('#provSupplier').empty().append(
                '<option selected disabled>- Pilih Provinsi -</option>'
            );
            $.get("/lokasi/provinsi", function(data, status) {
                data.forEach(function(item, index) {

                    if (item.id_prov == id_prov) {
                        $('#provSupplier').append(
                            `<option value="${item.id_prov}" selected> ${item.nama} </option>`
                        );
                    } else {
                        $('#provSupplier').append(
                            `<option value="${item.id_prov}"> ${item.nama} </option>`
                        );
                    }
                });
            });
        } else {
            $.get("/lokasi/provinsi", function(data, status) {
                data.forEach(function(item, index) {
                    $('#provSupplier').append(
                        `<option value="${item.id_prov}"> ${item.nama} </option>`);
                });
            });
        }

        if ($('#kotaSupplier').val() !== null) {
            var id_kab = $('#kotaSupplier').val();

            $('#kotaSupplier').empty().append(
                '<option selected disabled>- Pilih Kabupaten -</option>'
            );
            let url = '/lokasi/provinsi/${id_prov}/kabupaten';
            $.get(url, function(data, status) {
                data.forEach(function(item, index) {

                    if (item.id_kab == id_kab) {
                        $('#kotaSupplier').append(
                            `<option value="${item.id_kab}" selected> ${item.nama} </option>`
                        );
                    } else {
                        $('#kotaSupplier').append(
                            `<option value="${item.id_kab}"> ${item.nama} </option>`
                        );
                    }
                });
            });
        }
    });
</script>
@endsection