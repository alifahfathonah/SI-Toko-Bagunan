@extends('layout.header')
@extends('layout.sidebar')
@extends('layout.footer')
@extends('layout.main')
@section('title', 'Dashboard')


@section('contain')

<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Sistem Informasi Toko Bangunan Sumber Rejeki</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Administrator</div>
                    <div class="card-category">Panduan petunjuk penggunaan aplikasi dapat diunduh pada lampiran di bawah ini</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection