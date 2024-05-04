@extends('customer.layouts.main')

@section('content')
<!-- section -->
<section>
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <div class="p-6 d-flex justify-content-between align-items-center d-md-none">
                    <!-- heading -->
                    <h3 class="fs-5 mb-0">Account Setting</h3>
                    <!-- btn -->
                    <button class="btn btn-outline-gray-400 text-muted d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAccount" aria-controls="offcanvasAccount">
                        <i class="feather-icon icon-menu"></i>
                    </button>
                </div>
            </div>
            <!-- col -->
            <div class="col-lg-3 col-md-4 col-12 border-end  d-none d-md-block">
                <div class="pt-10 pe-lg-10">
                    <!-- nav item -->
                    <ul class="nav flex-column nav-pills nav-pills-dark">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('profil.cutomer') }}"><i class="feather-icon icon-shopping-bag me-2"></i>Profil</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('profil.customer.edit') }}"><i class="feather-icon icon-settings me-2"></i>Edit Profil</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profil.customer.ganti') }}"><i class="feather-icon icon-key me-2"></i>Ganti Kata Sandi</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <hr>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="feather-icon icon-log-out me-2"></i>Keluar</a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-8 col-12">
                <div class="p-6 p-lg-10">
                    <div class="mb-6">
                        <!-- heading -->
                        <h2 class="mb-0">Profil</h2>
                    </div>
                    <div class="col">
                        <div class="card card-product">
                            <div class="card-body">
                                <div class="text-center position-relative "> <a href="#!"><img src="{{ asset('storage/user/' . auth()->user()->image) }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                                </div>
                                <div class="text-small mb-1"><small>Email</small></div>
                                <h2 class="fs-6"><a class="text-inherit text-decoration-none">{{ $user->email }} </a></h2>
                                <div class="text-small mb-1"><small>Nama</small></div>
                                <h2 class="fs-6"><a class="text-inherit text-decoration-none">{{ $user->nama }} </a></h2>
                                <div class="text-small mb-1"><small>No. Handphone</small></div>
                                <h2 class="fs-6"><a class="text-inherit text-decoration-none">{{ $user->no_telpon }} </a></h2>
                                <div class="text-small mb-1"><small>Alamat</small></div>
                                <h2 class="fs-6"><a class="text-inherit text-decoration-none">{{ $user->alamat }} </a></h2>
                                <div class="text-small mb-1"><small>Jenis Kelamin</small></div>
                                <h2 class="fs-6"><a class="text-inherit text-decoration-none">{{ $user->jenis_kelamin }} </a></h2>
                                <div class="text-small mb-1"><small>Tempat, Tanggal Lahir</small></div>
                                <h2 class="fs-6"><a class="text-inherit text-decoration-none">{{ $user->tempat_lahir }}, {{ $user->tanggal_lahir }} </a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

@endsection