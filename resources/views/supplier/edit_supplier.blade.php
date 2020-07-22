@extends('layout.main')
@section('title', 'Tambah Supplier')


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
                                            <option>--Pilih Provinsi--</option>
                                            <option value="Jawa Barat" {{ ($supplier->province == "Jawa Barat" ) ? 'selected' : '' }}>Jawa Barat</option>
                                            <option value="Jawa Tengah" {{ ($supplier->province == "Jawa Tengah" ) ? 'selected' : '' }}>Jawa Tengah</option>
                                            <option value="Jawa Timur" {{ ($supplier->province == "Jawa Timur" ) ? 'selected' : '' }}>Jawa Timur</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Kota</label>
                                        <select class="form-control" name="kotaSupplierEdit" id="kotaSupplierEdit">
                                            <option>--Pilih Kota--</option>
                                            <option value="Bangkalan" {{ ($supplier->city == "Bangkalan" ) ? 'selected' : '' }}>Bangkalan</option>
                                            <option value="Pamekasan" {{ ($supplier->city == "Pamekasan" ) ? 'selected' : '' }}>Pamekasan</option>
                                            <option value="Sampang" {{ ($supplier->city == "Sampang" ) ? 'selected' : '' }}>Sampang</option>
                                            <option value="Sumenep" {{ ($supplier->city == "Sumenep" ) ? 'selected' : '' }}>Sumenep</option>
                                        </select>
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

@endsection