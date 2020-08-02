@extends('layout.main')
@section('title', 'Edit Sales')


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
                    <a href="{{route('sales.index')}}">Sales</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Sales</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Sales</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('sales.update', $sales->id)}}">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="form-control" name="supplierEdit" id="supplierEdit">
                                            <option>--Pilih Supplier--</option>
                                            @foreach ($suppliers as $supplier)
                                            <option value="{{$supplier->id}}" {{ ($sales->supplier_id == $supplier->id ) ? 'selected' : '' }}>{{$supplier->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" name="namaSalesEdit" id="namaSalesEdit" value="{{$sales->name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" name="phoneSalesEdit" id="phoneSalesEdit" value="{{$sales->phone}}">
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