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
                    <h3 class="fs-5 mb-0">Ganti Kata Sandi</h3>
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
                            <a class="nav-link" aria-current="page" href="{{ route('profil.cutomer') }}"><i class="feather-icon icon-shopping-bag me-2"></i>Profil</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('profil.customer.edit') }}"><i class="feather-icon icon-settings me-2"></i>Edit Profil</a>
                        </li>
                        <!-- nav item -->
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('profil.customer.ganti') }}"><i class="feather-icon icon-key me-2"></i>Ganti Kata Sandi</a>
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
                        <h2 class="mb-0">Ganti Kata Sandi</h2>
                    </div>
                    <div>
                        <div class="pe-lg-14">
                            <!-- heading -->
                            <h5 class="mb-4">Kata Sandi</h5>
                            <form action="{{ route('profil.change.password', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-10">
                                        <div class="col-12">
                                            <label for="current_password" class="form-label">Kata Sandi Lama</label>
                                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Masukkan Kata Sandi Lama">
                                            @error('current_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3 col">
                                            <label for="new_password" class="form-label">Kata Sandi Baru</label>
                                            <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" placeholder="Masukkan Kata Sandi Baru">
                                            @error('new_password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- input -->
                                        <div class="mb-3 col">
                                            <div class="mb-3">
                                                <label for="new_password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                                                <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" placeholder="Tulis Kembali Kata Sandi Baru">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

@section('script')

@endsection