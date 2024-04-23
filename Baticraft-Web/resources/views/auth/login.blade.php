@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex h-100 align-items-center justify-content-center py-4 py-sm-5">
    <div class="card card-body" style="max-width: 940px"><a class="position-absolute top-0 end-0 nav-link fs-sm py-1 px-2 mt-3 me-3" href="#" onclick="window.history.go(-1); return false;"><i class="fi-arrow-long-left fs-base me-2"></i>Kembali</a>
        <div class="row mx-0 align-items-center">
            <div class="col-md-6 border-end-md p-2 p-sm-5">
                <h2 class="h3 mb-4 mb-sm-5">B A T I C R A F T !<br>Selamat Datang Kembali.</h2><img class="d-block mx-auto" src="{{ asset('assets/customer/images/login.png') }}" width="344" alt="Illustartion">
                <div class="mt-4 mt-sm-5">Belum Punya Akun? <a href="{{ route('register') }}">Daftar Disini</a></div>
            </div>
            <div class="col-md-6 px-2 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                <!-- <a class="btn btn-outline-info w-100 mb-3" href="#">
                    <i class="fi-google fs-lg me-1"></i>Sign in with Google</a>
                <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3">Atau</div>
                    <hr class="w-100">
                </div> -->
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf
                    <div class="mb-4">
                        <label class="form-label mb-2" for="signin-email">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <!-- <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label mb-0" for="signin-password">{{ __('Kata Sandi') }}</label><a class="fs-sm" href="#">Lupa
                                Kata Sandi?</a>
                        </div> -->
                        <div class="password-toggle">
                            <input id="signin-password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            <!-- <input class="form-control" type="password" id="signin-password" placeholder="Enter password" required> -->
                            <label class="password-toggle-btn" aria-label="Show/hide password">
                            </label>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-info btn-lg w-100" type="submit">{{ __('Login') }}</button>
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Lupa Kata Sandi?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection