@extends('layout.main')
@section('title', 'Daftar Antrian Pengiriman')


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
                    <a href="#">Daftar Antrian Pengiriman</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Antrian Pengiriman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPengiriman" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">Tanggal</th>
                                        <th>Nama Pembeli</th>
                                        <th>Driver</th>
                                        <th width="10%">Status Pengiriman</th>
                                        <th width="10%">Prioritas Pengiriman</th>

                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($shippings as $shipping)
                                    <tr {!!rowColor($shipping->prioritas)!!}>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$shipping->tanggal_pengiriman}}</td>
                                        <td>{{$shipping->penjualan->nama_pembeli}}</td>
                                        <td>{{@$shipping->driver->name?? "-"}}</td>
                                        <td>{!!badge($shipping->status)!!}</td>
                                        <td>{!!badge($shipping->prioritas)!!}</td>

                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item sendBtn" data-toggle="modal" data-target="#kirimPesanan" data-pengiriman="{{$shipping->id}}">Kirim Pesanan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{url('/pengiriman/cetak_invoice', $shipping->id)}}">Cetak Surat Jalan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pengiriman.detail',['pengiriman'=>$shipping])}}">Detail</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pengiriman.form.edit',['pengiriman'=>$shipping])}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <form class="formDelete" action="{{route('pengiriman.hapus',['pengiriman'=>$shipping])}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class=" modal fade" id="kirimPesanan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Kirim Pesanan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pengiriman.kirim',['pengiriman'=>':pengiriman'])}}" id="sendPengiriman" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="idPengiriman" id="idPengiriman">
                        <div class="col-md-12 pr-0">
                            <div class="form-group">
                                <label>Supir</label>
                                <select class="form-control" name="driver" id="optionDriver">
                                    <option value="" selected disabled>- Pilih Supir -</option>
                                    @foreach ($drivers as $driver)
                                    <option value="{{$driver->id}}">{{$driver->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" id="kirimPesananBtn" disabled>Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#daftarPengiriman').DataTable({
            "pageLength": 10,
        });

        $('#sendPengiriman').submit(function(e) {
            e.preventDefault();
            $('#kirimPesanan').modal('toggle');
            swalLoading();
            var data = $(this).serializeArray();
            const idPengiriman = $('#idPengiriman').val();
            var url = $(this).attr('action').replace(':pengiriman', idPengiriman);
            $.post(url, data, function(response) {
                    swal.close();
                    if (response.success) {
                        swalSend().then((result) => {
                            if (result.value) {
                                window.open(`/pengiriman/cetak_invoice/${idPengiriman}`);
                            }
                            swalLoading();
                            location.reload();
                        })
                    } else {
                        swalError(response.message);
                    }
                })
                .fail(function() {
                    swalError('Maaf Terjadi Error');
                });
        })

        $('.sendBtn').click(function() {
            $('#idPengiriman').val($(this).data('pengiriman'));
        });

        $('#kirimPesanan').on('hidden.bs.modal', function() {
            $("#sendPengiriman").trigger("reset");
            $('#kirimPesananBtn').attr('disabled','disabled');
        })

        $('.formDelete').on('submit', function(e) {
            e.preventDefault();

            swalDelete('Apakah anda yakin ingin menghapus pengiriman?')
                .then((result) => {
                    if (result.value) {
                        swalLoading();
                        var url = $('.formDelete').attr('action');
                        var data = $('.formDelete').serializeArray();
                        $.post(url, data, function(response) {
                            swal.close();
                            if (response.success) {
                                swalSuccess('Hapus data berhasil');
                                location.reload();
                            }
                            else{
                                swalError('Pilih supir terlebih dahulu');
                            }
                        })
                    }
                })

        })

        $('#optionDriver').change(function(){
            if($(this).val() == ""){
                $('#kirimPesananBtn').attr('disabled','disabled');
            }
            else{
                $('#kirimPesananBtn').removeAttr('disabled');
            }
        })
    });
</script>
@endsection