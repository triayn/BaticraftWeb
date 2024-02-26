@extends('admin.layouts.main')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard Admin</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                    </div>
                    <div class="chart-content-bg">
                        <div class="row text-center justify-content-center">
                            <!-- Menambahkan class justify-content-center -->
                            <div class="col-sm-6"><br>
                                <h4 class="header-title">Pemasukan Hari Ini</h4>
                                <h2 class="fw-normal mb-3">
                                    <small class="mdi mdi-checkbox-blank-circle text-primary align-middle me-1"></small>
                                    <span>$58,254</span>
                                </h2>
                            </div>
                        </div>
                    </div><br>

                    <div class="row">
                        <div class="col-md-6"> <!-- Bagian Pertama -->
                            <div class="card tilebox-one">
                                <div class="card-body">
                                    <i class='uil uil-users-alt float-end'></i>
                                    <h6 class="text-uppercase mt-0">Pembeli Hari Ini</h6>
                                    <h2 class="my-2" id="active-users-count">121</h2>
                                    <p class="mb-0 text-muted">
                                        <span class="text-success me-2"><span class="mdi mdi-arrow-up-bold"></span>
                                            5.27%</span>
                                        <span class="text-nowrap">Since last month</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6"> <!-- Bagian Kedua -->
                            <div class="card tilebox-one">
                                <div class="card-body">
                                    <i class='uil uil-window-restore float-end'></i>
                                    <h6 class="text-uppercase mt-0">Produk Terjual Hari Ini</h6>
                                    <h2 class="my-2" id="active-views-count">560</h2>
                                    <p class="mb-0 text-muted">
                                        <span class="text-danger me-2"><span class="mdi mdi-arrow-down-bold"></span>
                                            1.08%</span>
                                        <span class="text-nowrap">Since previous week</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    @endsection


    {{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>BERHASIL LOGIN </h1>
                    <h3>Nama : {{ Auth::user()->nama }}</h3>
                    <h4>Role : {{ Auth::user()->role }}</h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <!-- {{ __('You are logged in!') }} -->
                </div>
                <div class="card-body">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
