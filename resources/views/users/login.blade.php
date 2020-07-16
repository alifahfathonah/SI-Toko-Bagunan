@extends('layout.user')
@section('title', 'Login Page')

@section('form')
<!-- Container -->
<div class="content">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <br>
        <div class="card-pricing2 card-primary">
            <div class="pricing-header">
                <h3 class="fw-bold">LOGIN</h3>
                <span class="sub-title">Sistem Informasi</span>
                <span class="sub-title">Toko Bangunan Sumber Rejeki</span>
            </div>
            <div class="price-value">
                <div class="value">
                    <!-- <span class="logo"><img src="../public/assets/Atlantis-Lite-master/examples/assets/img/pp.jpg" alt="..." class="avatar-img"></span> -->
                    <span class="amount">SR</span>
                    <!-- <span class="month">/month</span> -->
                </div>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <br>
                    <form action="{{url('dashboard')}}">
                        <div class="form-group">
                            <input type="text" class="form-control form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-border btn-lg w-100 fw-bold mb-3"><i class="fas fa-key"> Login</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
@endsection