@extends('layout.main')
@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')
@section('title', 'Daftar Supplier')


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
                    <a href="#">Supplier</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Supplier</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Supplier</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{url('/supplier/tambah_supplier')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarSupplier" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th>Kode Pos</th>
                                        <th>Telephone</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Dimas</td>
                                        <td>Kamal</td>
                                        <td>Bangkalan</td>
                                        <td>Jawa Timur</td>
                                        <td>69162</td>
                                        <td>08983498757</td>
                                        <td>
                                            <div class="form-button-action">
                                                <span data-toggle="modal" data-target="#editModal"><button class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></button></span>
                                                <span data-toggle="modal" data-target="#hapusModal"><button class="btn btn-link btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"><i class="fa fa-times"></i></button></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Data Supplier</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/')}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control form-control" id="namaSupplierEdit">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control form-control" id="alamatSupplierEdit">
                            </div>
                        </div>
                        <div class="col-md-4 pr-0">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <!-- <input id="provSupplierEdit" type="text" class="form-control"> -->
                                <select class="form-control" id="provSupplierEdit">
                                    <option>--Pilih Provinsi--</option>
                                    <option>Jawa Barat</option>
                                    <option>Jawa Tengah</option>
                                    <option>Jawa Timur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 pr-0">
                            <div class="form-group">
                                <label>Kota</label>
                                <!-- <input id="kotaSupplierEdit" type="text" class="form-control"> -->
                                <select class="form-control" id="kotaSupplierEdit">
                                    <option>--Pilih Kota--</option>
                                    <option>Bangkalan</option>
                                    <option>Pamekasan</option>
                                    <option>Sampang</option>
                                    <option>Sumenep</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Kode Pos</label>
                                <input id="posSupplierEdit" type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="number" class="form-control form-control" id="phoneSupplierEdit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
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
                        Hapus Data Supplier</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/')}}">
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan nama . . . . . ?</p>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#daftarSupplier').DataTable({
            "pageLength": 5,
        });
    });
</script>
@endsection