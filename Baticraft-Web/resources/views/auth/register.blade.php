@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex h-100 align-items-center justify-content-center py-4 py-sm-5">
    <div class="card card-body" style="max-width: 940px"><a class="position-absolute top-0 end-0 nav-link fs-sm py-1 px-2 mt-3 me-3" href="#" onclick="window.history.go(-1); return false;"><i class="fi-arrow-long-left fs-base me-2"></i>Kembali</a>
        <div class="row mx-0 align-items-center">
            <div class="col-md-6 border-end-md p-2 p-sm-5">
                <h2 class="h3 mb-4 mb-sm-5">B A T I C R A F T !<br>Griya Sri Siji Nganjuk</h2>
                <ul class="list-unstyled mb-4 mb-sm-5">
                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Batik Buatan Rumahan</span></li>
                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Kualitas Batik Terjamin</span></li>
                    <li class="d-flex mb-0"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Motif Batik Khusus</span></li>
                </ul><img class="d-block mx-auto" src="{{ asset('assets/customer/images/registrasi.png') }}" width="344" alt="Illustartion">
                <div class="mt-sm-4 pt-md-3">Sudah Punya Akun? <a href="{{ route('login') }}">Masuk Disini</a></div>
            </div>
            <div class="col-md-6 px-2 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                <form class="needs-validation" novalidate method="POST" action="{{ route('register') }}">
                @csrf
                    <div class="mb-4">
                        <label class="form-label" for="signup-name">Nama Lengkap</label>
                        <input id="signup-name" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="name" autofocus>

                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4" hidden>
                        <input id="signup-role" type="text" class="form-control @error('role') is-invalid @enderror" value="pembeli" required autocomplete="role">
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="signup-email">No Handphone</label>
                        <input id="signup-phone" type="text" class="form-control @error('no_telpon') is-invalid @enderror" name="no_telpon" value="" required autocomplete="no_telpon" placeholder="+62">

                        @error('no_telpon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="signup-email">Email</label>
                        <input id="signup-email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="signup-password">Kata Sandi <span class='fs-sm text-muted'>min. 8 char</span></label>
                        <div class="password-toggle">
                            <input id="signup-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" minlength="8">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="signup-password-confirm">Konfirmasi Kata Sandi</label>
                        <div class="password-toggle">
                        <input id="signup-password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" minlength="8">
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                                <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                            </label>
                        </div>
                    </div>
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="agree-to-terms" required>
                        <label class="form-check-label" for="agree-to-terms">Dengan bergabung, saya menyetujui Ketentuan Penggunaan dan Kebijakan Privasi</label>
                    </div> 
                    <button class="btn btn-info btn-lg w-100" type="submit">{{ __('Register') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->