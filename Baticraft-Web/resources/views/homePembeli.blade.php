@extends('customer.layouts.main')
@section('content')
<section class="mt-8">
    <!-- contianer -->
    <div class="container">
        <div class="row">
            <!-- col -->
            <div class="col-12">
                <!-- cta -->
                <div class="bg-light d-lg-flex justify-content-between align-items-center py-6 py-lg-3 px-8 rounded-3 text-center text-lg-start">
                    <!-- img -->
                    <div class="d-lg-flex align-items-center">
                        <img src="{{ asset('assets/customer/images/about/about-icons-1.svg') }}" alt="" class="img-fluid">
                        <!-- text -->

                        <div class="ms-lg-4">
                            <h1 class="fs-2 mb-1">Selamat Datang Di Baticraft</h1>
                            <span>Kami menyediakan berbagai jenis Batik seperti Batik Cap, Batik Sarimbitan, Batik
                                Sasirangan
                                Batik Tulis. Kami menyediakan produk yang dibuat oleh rumahan dengan kualitas yang
                                terjamin
                                dan desain yang khas</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- section -->
<section class="mt-8">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class=" banner mb-3">

                    <!-- Banner Content -->
                    <div class="position-relative">
                        <!-- Banner Image -->
                        <img src="{{ asset('assets/customer/images/banner/kain.png') }}" alt="" class="img-fluid rounded-3 w-100">

                        <div class="banner-text">
                            <h3 class="mb-0 fw-bold" style="color: white;"> Kain Batik </h3>
                            <div class="mt-4 mb-5 fs-5">
                                <!-- <p class="mb-0">Max cashback: $12</p>
                                    <span>Code: <span class="fw-bold text-dark">CARE12</span></span> -->
                            </div>
                            <br>
                            <br><br>
                            <br>
                            <a href="#" class="btn btn-light">Cek Produk</a>
                        </div>
                        <!-- Banner Content -->



                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-6  col-12">
                <div class="banner mb-3 ">

                    <!-- Banner Content -->
                    <div class="position-relative">
                        <!-- Banner Image -->
                        <img src="{{ asset('assets/customer/images/banner/kemeja.png') }}" alt="" class="img-fluid rounded-3 w-100">
                        <div class="banner-text">
                            <!-- Banner Content -->
                            <h3 class=" fw-bold mb-2" style="color: white;">Kemeja Batik </h3>
                            <!-- <p class="fs-5">Refresh your day <br>
                                    the fruity way</p> -->
                            <br>
                            <br><br>
                            <br>
                            <a href="#" class="btn btn-light">Cek Produk</a>
                        </div>


                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-12">
                <div class="banner mb-3">


                    <div class="banner-img">
                        <!-- Banner Image -->
                        <img src="{{ asset('assets/customer/images/banner/kaos.png') }}" alt="" class="img-fluid rounded-3 w-100">
                        <!-- Banner Content -->
                        <div class="banner-text">
                            <h3 class="fs-2 fw-bold lh-1 mb-2" style="color: white;">Kaos Batik</h3>
                            <!-- <p class="fs-5">Enjoy a scoop of<br>
                                    summer today</p> -->
                            <br>
                            <br><br>
                            <br>
                            <a href="#" class="btn btn-light">Cek Produk</a>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

<!-- Pesanan -->
<section class="my-lg-14 my-8">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="d-md-flex justify-content-between align-items-center mb-8">
                    <div>
                        <h3 class=" mb-1">Pesanan anda</h3>
                    </div>
                    <div>
                        <a href="#">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <section class="mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-12 col-md-6 col-lg-4 mb-8">
                        <div class="mb-4">
                            <a href="#!">
                                <!-- img -->
                                <div class="img-zoom">
                                    <img src="{{ asset('assets/customer/images/blog/blog-img-1.jpg') }}" alt="" class="img-fluid rounded-3 w-100">
                                </div>
                            </a>
                        </div>
                        <div class="mb-3"><a href="#!">status</a>

                        </div>
                        <!-- text -->
                        <div>
                            <h2 class="h5"><a href="#!" class="text-inherit">Total Pesanan: Rp 320.00,00</a>
                            </h2>
                            <div class="d-flex justify-content-between text-muted mt-4"><span><small>22 April
                                        2023</small></span><span><small>Total Pesanan: <span class="text-dark fw-bold">6 pcs</span></small></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</section>

<!-- Kategori Kain -->
<section class="my-lg-14 my-8">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="d-md-flex justify-content-between align-items-center mb-8">
                    <div>
                        <h3 class=" mb-1">Kain Batik</h3>
                        <p>Dapatkan kain batik berkualitas tinggi.</p>
                    </div>
                    <div>
                        <a href="#">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border rounded-3 border-2 border-info">
            <div class="col  mb-lg-0">
                <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative text-center">

                        <div class="text-center position-relative ">


                            <!-- img -->
                            <a href="#!"> <img src="{{ asset('assets/customer/images/products/product-img-2.jpg') }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                            <!-- action btn -->
                            <div class="product-action-btn">
                                <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Produk"></i></a>

                            </div>

                        </div>
                        <div class="mb-3"><span class="text-dark">$15</span>
                        </div>
                        <!-- title -->
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia
                                NutriChoice
                                Digestive Biscuits</a></h2>

                        <div class="mt-3"><span class="text-uppercase small text-primary">
                                Tersedia</span></div>
                        <div class="mt-4">

                            <div class="my-3">
                                <small>Stok produk tersedia : <span class="text-dark fw-bold">12</span></small>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="product-fade-block">
                            <div class="d-grid mt-4">
                                <a href="#" class="btn btn-primary rounded-pill">Masukkan Keranjanng</a>
                            </div>
                        </div>

                    </div>
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kategori Kemeja -->
<section class="my-lg-14 my-8">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="d-md-flex justify-content-between align-items-center mb-8">
                    <div>
                        <h3 class=" mb-1">Kemeja Dengan Motif Batik</h3>
                        <p>Dapatkan kemeja dengan ukuran dan desain yang sesuai dengan anda.</p>
                    </div>
                    <div>
                        <a href="#">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border rounded-3 border-2 border-info">
            <div class="col  mb-lg-0">
                <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative text-center">

                        <div class="text-center position-relative ">


                            <!-- img -->
                            <a href="#!"> <img src="{{ asset('assets/customer/images/products/product-img-2.jpg') }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                            <!-- action btn -->
                            <div class="product-action-btn">
                                <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Produk"></i></a>

                            </div>

                        </div>
                        <div class="mb-3"><span class="text-dark">$15</span>
                        </div>
                        <!-- title -->
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia
                                NutriChoice
                                Digestive Biscuits</a></h2>

                        <div class="mt-3"><span class="text-uppercase small text-primary">
                                Tersedia</span></div>
                        <div class="mt-4">

                            <div class="my-3">
                                <small>Stok produk tersedia : <span class="text-dark fw-bold">12</span></small>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="product-fade-block">
                            <div class="d-grid mt-4">
                                <a href="#" class="btn btn-primary rounded-pill">Masukkan Keranjanng</a>
                            </div>
                        </div>

                    </div>
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kategori Kaos -->
<section class="my-lg-14 my-8">
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="d-md-flex justify-content-between align-items-center mb-8">
                    <div>
                        <h3 class=" mb-1">Kaos Dengan Motif Batik Batik</h3>
                        <p>Kaos batik dengan berbagai pilihan ukuran.</p>
                    </div>
                    <div>
                        <a href="#">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border rounded-3 border-2 border-info">
            <div class="col  mb-lg-0">
                <div class="card  card-product-v2 h-100">
                    <div class="card-body position-relative text-center">

                        <div class="text-center position-relative ">


                            <!-- img -->
                            <a href="#!"> <img src="{{ asset('assets/customer/images/products/product-img-2.jpg') }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                            <!-- action btn -->
                            <div class="product-action-btn">
                                <a href="#!" class="btn-action mb-1" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Produk"></i></a>

                            </div>

                        </div>
                        <div class="mb-3"><span class="text-dark">$15</span>
                        </div>
                        <!-- title -->
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Britannia
                                NutriChoice
                                Digestive Biscuits</a></h2>

                        <div class="mt-3"><span class="text-uppercase small text-primary">
                                Tersedia</span></div>
                        <div class="mt-4">

                            <div class="my-3">
                                <small>Stok produk tersedia : <span class="text-dark fw-bold">12</span></small>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="product-fade-block">
                            <div class="d-grid mt-4">
                                <a href="#" class="btn btn-primary rounded-pill">Masukkan Keranjanng</a>
                            </div>
                        </div>

                    </div>
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


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