<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from finder.createx.studio/real-estate-home-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 04 Aug 2022 19:20:27 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Finder - Directory &amp; Listings Bootstrap Template">
    <meta name="keywords" content="bootstrap, business, directory, listings, e-commerce, car dealer, city guide, real estate, job board, user account, multipurpose, ui kit, html5, css3, javascript, gallery, slider, touch">
    <meta name="author" content="Createx Studio">
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="mask-icon" color="#5bbad5" href="safari-pinned-tab.svg">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->
    <style>
        .body {
            background-color: #fff;
        }
        .page-loading {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            -webkit-transition: all .4s .2s ease-in-out;
            transition: all .4s .2s ease-in-out;
            background-color: #fff;
            opacity: 0;
            visibility: hidden;
            z-index: 9999;
        }

        .page-loading.active {
            opacity: 1;
            visibility: visible;
        }

        .page-loading-inner {
            position: absolute;
            top: 50%;
            left: 0;
            width: 100%;
            text-align: center;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: opacity .2s ease-in-out;
            transition: opacity .2s ease-in-out;
            opacity: 0;
        }

        .page-loading.active>.page-loading-inner {
            opacity: 1;
        }

        .page-loading-inner>span {
            display: block;
            font-size: 1rem;
            font-weight: normal;
            color: #666276;
            ;
        }

        .page-spinner {
            display: inline-block;
            width: 2.75rem;
            height: 2.75rem;
            margin-bottom: .75rem;
            vertical-align: text-bottom;
            border: .15em solid #bbb7c5;
            border-right-color: transparent;
            border-radius: 50%;
            -webkit-animation: spinner .75s linear infinite;
            animation: spinner .75s linear infinite;
        }

        @-webkit-keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
    <!-- Page loading scripts-->
    <script>
        (function() {
            window.onload = function() {
                var preloader = document.querySelector('.page-loading');
                preloader.classList.remove('active');
                setTimeout(function() {
                    preloader.remove();
                }, 2000);
            };
        })();
    </script>
    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/customer/vendor/simplebar/dist/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('assets/customer/vendor/nouislider/dist/nouislider.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('assets/customer/vendor/tiny-slider/dist/tiny-slider.css') }}" />
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="{{ asset('assets/customer/css/theme.min.css') }}">
    <!-- Google Tag Manager-->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                '../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WKV3GT5');
    </script>
</head>
<!-- Body-->

<body>
    
    <main class="page-wrapper">
        <!-- Navbar-->
        <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-scroll-header>
            <div class="container"><a class="navbar-brand me-3 me-xl-4" href="real-estate-home-v1.html">Baticraft</a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Sign in</a><a class="btn btn-primary btn-sm ms-2 order-lg-3" href="real-estate-add-property.html"><i class="fi-plus me-2"></i>Keranjang<span class='d-none d-sm-inline'></span></a>
                <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
                    <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
                        <!-- Menu items-->
                        <li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="real-estate-catalog-rent.html">Property for Rent</a></li>
                                <li><a class="dropdown-item" href="real-estate-catalog-sale.html">Property for Sale</a></li>
                                <li><a class="dropdown-item" href="real-estate-single-v1.html">Single Property v.1</a></li>
                                <li><a class="dropdown-item" href="real-estate-single-v2.html">Single Property v.2</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="real-estate-account-info.html">Personal Info</a></li>
                                <li><a class="dropdown-item" href="real-estate-account-security.html">Password &amp; Security</a></li>
                                <li><a class="dropdown-item" href="real-estate-account-properties.html">My Properties</a></li>
                                <li><a class="dropdown-item" href="real-estate-account-wishlist.html">Wishlist</a></li>
                                <li><a class="dropdown-item" href="real-estate-account-reviews.html">Reviews</a></li>
                                <li><a class="dropdown-item" href="real-estate-account-notifications.html">Notifications</a></li>
                                <li><a class="dropdown-item" href="signin-light.html">Sign In</a></li>
                                <li><a class="dropdown-item" href="signup-light.html">Sign Up</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vendor</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="real-estate-add-property.html">Add Property</a></li>
                                <li><a class="dropdown-item" href="real-estate-property-promotion.html">Property Promotion</a></li>
                                <li><a class="dropdown-item" href="real-estate-vendor-properties.html">Vendor Page: Properties</a></li>
                                <li><a class="dropdown-item" href="real-estate-vendor-reviews.html">Vendor Page: Reviews</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="real-estate-about.html">About</a></li>
                                <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="real-estate-blog.html">Blog Grid</a></li>
                                        <li><a class="dropdown-item" href="real-estate-blog-single.html">Single Post</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="real-estate-contacts.html">Contacts</a></li>
                                <li><a class="dropdown-item" href="real-estate-help-center.html">Help Center</a></li>
                                <li><a class="dropdown-item" href="real-estate-404.html">404 Not Found</a></li>
                            </ul>
                        </li>
                        <li class="nav-item d-lg-none"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Sign in</a></li>
                    </ul>
                </div>
            </div>
        </header>

        <!-- Hero-->
      <section class="container pt-5 my-5 pb-lg-4">
        <div class="row pt-0 pt-md-2 pt-lg-0">
          <div class="col-xl-7 col-lg-6 col-md-5 order-md-2 mb-4 mb-lg-3"><img src="{{ asset('assets/customer/images/hero-image.jpg') }}" alt="Hero image"></div>
          <div class="col-xl-5 col-lg-6 col-md-7 order-md-1 pt-xl-5 pe-lg-0 mb-3 text-md-start text-center">
            <h1 class="display-4 mt-lg-5 mb-md-4 mb-3 pt-md-4 pb-lg-2">Easy way to find <br> a perfect property</h1>
            <p class="position-relative lead me-lg-n5">We provide a complete service for the sale, purchase or rental of real estate. We have been operating more than 10 years. Search millions of apartments and houses on Finder.</p>
          </div>
        </div>
      </section>
    </main>
    <!-- Footer-->
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"> </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="{{ asset('assets/customer/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/vendor/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/customer/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('assets/customer/vendor/nouislider/dist/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/customer/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js') }}"></script>
</body>

</html>

<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <h1>BERHASIL LOGIN</h1>
                    <h3>Nama : {{ Auth::user()->nama }}</h3>
                    <h4>Role : {{ Auth::user()->role }}</h4>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
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
@endsection -->