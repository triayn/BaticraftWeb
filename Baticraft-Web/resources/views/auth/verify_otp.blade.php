<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="FreshCart is a beautiful eCommerce HTML template specially Desained for multipurpose shops & online stores selling products. Most Loved by Developers to build a store website easily.">
    <meta content="Codescandy" name="author" />


    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/admin/images/favicon.ico') }}">



    <!-- Libs CSS -->
    <link href="{{ asset('assets/customer/libs/bootstrap-icons/font/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/customer/libs/feather-webfont/dist/feather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/customer/libs/slick-carousel/slick/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/customer/libs/slick-carousel/slick/slick-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/customer/libs/simplebar/dist/simplebar.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/customer/libs/nouislider/dist/nouislider.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/libs/tiny-slider/dist/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/customer/libs/dropzone/dist/min/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/customer/libs/prismjs/themes/prism-okaidia.min.css') }}" rel="stylesheet">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('assets/customer/css/theme.min.css') }}">
</head>

<body>

    <!-- navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('assets/admin/images/logo.png') }}" alt="" class="d-inline-block align-text-top">
                </a>
            </div>
        </nav>
    </div>

    <section class="my-lg-14 my-8">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img src="{{ asset('assets/admin/images/email-pass.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
                    <div>
                        <div class="mb-lg-9 mb-5">
                            <!-- heading -->
                            <h1 class="mb-2 h2 fw-bold">Lupa Kata Sandi?</h1>
                            <p>Silakan masukkan kode OTP yang sudah dikirim</p>
                        </div>
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        <!-- form -->
                        <form method="POST" action="{{ route('sendOtp') }}">
                            @csrf
                            <!-- row -->
                            <div class="row g-3">
                                <!-- col -->
                                <div class="row md-1">
                                    <label for="email" class="col-md-4 col-form-label">{{ __('Email') }}</label>

                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="email"  required autocomplete="email" autofocus>

                                        
                                    </div>
                                </div>

                                <div class="row md-1">
                                    <label for="password" class="col-md-4 col-form-label">{{ __('Kata Sandi') }}</label>

                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="code" required autocomplete="new-password">

                                    </div>
                                </div>

                                <!-- btn -->
                                <div class="col-12 d-grid gap-2">
                                    <button type="submit" class="btn btn-primary">Atur Ulang Kata Sandi</button>
                                    <a href="{{ route('login') }}" class="btn btn-light">Kembali</a>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <footer class="row g-4 py-4">
                <div class="border-top py-4">
                    <div class="row align-items-center">
                        <div class="col-md-6"><span class="small text-muted">Copyright 2024 © Baticraft eCommerce. All
                                rights reserved. Powered by Wea5ley Team.</span>
                            <br>
                            <span class="small text-muted">Contact Developer: weasleyteam@gmail.com</span>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-inline text-md-end mb-0 small mt-3 mt-md-0">
                                <li class="list-inline-item text-muted">Follow us on</li>
                                <li class="list-inline-item">
                                    <a href="#!" class="icon-shape icon-sm social-links"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                        </svg></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </footer>
        </div>
    </div>
    <!-- Javascript-->
    <!-- Libs JS -->
    <script src="{{ asset('assets/customer/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/jquery-countdown/dist/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/slick-carousel/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/nouislider/dist/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/rater-js/index.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/prismjs/prism.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/prismjs/components/prism-scss.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/prismjs/plugins/toolbar/prism-toolbar.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/customer/libs/flatpickr/dist/flatpickr.min.js') }}"></script>

    <!-- Theme JS -->
    <script src="{{ asset('assets/customer/js/theme.min.js') }}"></script>
</body>

</html>