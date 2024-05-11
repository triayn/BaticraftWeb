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
                            <a href="{{ route('etalase.kain') }}" class="btn btn-light">Cek Produk</a>
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
                            <a href="{{ route('etalase.kemeja') }}" class="btn btn-light">Cek Produk</a>
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
                            <a href="{{ route('etalase.kaos') }}" class="btn btn-light">Cek Produk</a>
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
                        <a href="{{ route('etalase.kain') }}">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border rounded-3 border-2 border-info">
            @foreach ($kain->take(5)->reverse() as $satu)
            <div class="col mb-lg-0">
                <div class="card card-product-v2 h-100">
                    <div class="card-body position-relative text-center">
                        <div class="text-center position-relative">
                            <!-- img -->
                            @if($images->isNotEmpty())
                            @foreach($images as $image)
                            @if($image->product_id == $satu->id)
                            <a href="#!"> <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                            @break
                            @endif
                            @endforeach
                            @endif
                            <!-- action btn -->
                            <div class="product-action-btn">
                                <a href="{{ route('etalase.detail', $satu->id) }}" class="btn-action mb-1"><i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Produk"></i></a>
                            </div>
                        </div>
                        <div class="mb-3"><span class="text-dark">Rp {{ number_format($satu->harga, 0, ',', '.') }}</span></div>
                        <!-- title -->
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $satu->nama }}</a></h2>
                        <div class="mt-3"><span class="text-uppercase small text-primary">Tersedia</span></div>
                        <div class="mt-4">
                            <div class="my-3">
                                <small>Stok produk tersedia : <span class="text-dark fw-bold">{{ $satu->stok }} pcs</span></small>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="product-fade-block">
                            <div class="d-grid mt-4">
                                <form action="{{ route('keranjang.add') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $satu->id }}"> <!-- Ganti dengan ID produk yang sesuai -->
                                    <input type="hidden" name="jumlah" value="1"> <!-- Ganti dengan jumlah produk yang ingin ditambahkan -->
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        Masukkan Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                </div>
            </div>
            @endforeach
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
                        <a href="{{ route('etalase.kemeja') }}">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border rounded-3 border-2 border-info">
            @foreach ($kemeja->take(5)->reverse() as $dua)
            <div class="col mb-lg-0">
                <div class="card card-product-v2 h-100">
                    <div class="card-body position-relative text-center">
                        <div class="text-center position-relative">
                            <!-- img -->
                            @if($images->isNotEmpty())
                            @foreach($images as $image)
                            @if($image->product_id == $dua->id)
                            <a href="#!"> <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                            @break
                            @endif
                            @endforeach
                            @endif
                            <!-- action btn -->
                            <div class="product-action-btn">
                                <a href="{{ route('etalase.detail', $dua->id) }}" class="btn-action mb-1"><i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Produk"></i></a>
                            </div>
                        </div>
                        <div class="mb-3"><span class="text-dark">Rp {{ number_format($dua->harga, 0, ',', '.') }}</span></div>
                        <!-- title -->
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $dua->nama }}</a></h2>
                        <div class="mt-3"><span class="text-uppercase small text-primary">Tersedia</span></div>
                        <div class="mt-4">
                            <div class="my-3">
                                <small>Stok produk tersedia : <span class="text-dark fw-bold">{{ $dua->stok }} pcs</span></small>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="product-fade-block">
                            <div class="d-grid mt-4">
                                <form action="{{ route('keranjang.add') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $dua->id }}"> <!-- Ganti dengan ID produk yang sesuai -->
                                    <input type="hidden" name="jumlah" value="1"> <!-- Ganti dengan jumlah produk yang ingin ditambahkan -->
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        Masukkan Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                </div>
            </div>
            @endforeach
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
                        <a href="{{ route('etalase.kaos') }}">Lihat Semua <i class="feather-icon icon-chevron-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-0 border rounded-3 border-2 border-info">
            @foreach ($kaos->take(5)->reverse() as $tiga)
            <div class="col mb-lg-0">
                <div class="card card-product-v2 h-100">
                    <div class="card-body position-relative text-center">
                        <div class="text-center position-relative">
                            <!-- img -->
                            @if($images->isNotEmpty())
                            @foreach($images as $image)
                            @if($image->product_id == $tiga->id)
                            <a href="#!"> <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                            @break
                            @endif
                            @endforeach
                            @endif
                            <!-- action btn -->
                            <div class="product-action-btn">
                                <a href="{{ route('etalase.detail', $tiga->id) }}" class="btn-action mb-1"><i class="bi bi-eye" data-bs-toggle="tooltip" data-bs-html="true" title="Detail Produk"></i></a>
                            </div>
                        </div>
                        <div class="mb-3"><span class="text-dark">Rp {{ number_format($tiga->harga, 0, ',', '.') }}</span></div>
                        <!-- title -->
                        <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $tiga->nama }}</a></h2>
                        <div class="mt-3"><span class="text-uppercase small text-primary">Tersedia</span></div>
                        <div class="mt-4">
                            <div class="my-3">
                                <small>Stok produk tersedia : <span class="text-dark fw-bold">{{ $tiga->stok }} pcs</span></small>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="product-fade-block">
                            <div class="d-grid mt-4">
                                <form action="{{ route('keranjang.add') }}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $tiga->id }}"> <!-- Ganti dengan ID produk yang sesuai -->
                                    <input type="hidden" name="jumlah" value="1"> <!-- Ganti dengan jumlah produk yang ingin ditambahkan -->
                                    <button type="submit" class="btn btn-primary rounded-pill">
                                        Masukkan Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-content-fade border-info" style="margin-bottom: -60px;"></div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section>
    <div class="container">
        <hr class="my-lg-14 my-8">
        <!-- row -->
        <div class="row align-items-center">
            <div class=" offset-lg-2 col-lg-4 col-md-6">
                <div class="text-center">
                    <!-- img -->
                    <img src="{{ asset('assets/customer/images/png/custom.jpg') }}" alt="" class=" img-fluid">
                </div>
            </div>
            <div class=" col-lg-6 col-md-6">
                <div class="mb-6">
                    <div class="mb-7">
                        <!-- heading -->
                        <h2>Custome Desain Batik?</h2>
                        <p class="mb-0">Anda bisa melakukan custome untuk desain batik yang sesuai dan cocok dengan
                            anda,
                            silahkan hubungi kami melalui Whatsapp.
                        </p>
                    </div>
                    <!-- form -->
                    <form class="row g-3 mt-1">
                        <div class="col-auto">
                            <a href="https://wa.me/{{ $whatsappNumber }}" target="_blank" class="btn btn-primary mb-3">Hubungi Kami</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr class="my-lg-14 my-8">
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-6">
                <h3 class="mb-0">Informasi Toko</h3>
            </div>
        </div>
        <div class="row row-cols-lg-2 row-cols-1 row-cols-md-2 g-4">
            <div class="col">
                <div class="pt-8 px-8 rounded-3" style="background: url('{{ asset('storage/information/' . $info->image) }}') no-repeat; 
                        background-size: cover; height: 470px;">
                    <div>
                        <h3 class="fw-bold text-white">{{ $info->alamat }}
                        </h3><br>
                        <p class="text-white">No. Handphone: {{ $info->no_telpon }}</p>
                        <p class="text-white">Email: {{ $info->email }}</p>
                        <br><br><br>
                        <!-- <a href="#!" class="btn btn-primary">Kunjungi Sekarang <i class="feather-icon icon-arrow-right ms-1"></i></a> -->
                        <a href="{{ $info->lokasi }}" class="btn btn-primary">Kunjungi Sekarang <i class="feather-icon icon-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            <div class="col">

                <div class="card card-product">
                    <div class="card-body">
                        <!-- <div class="text-center  position-relative "> <a href="#!"><img src="{{ asset('storage/information/' .$info->image) }}" class="mb-3 img-fluid"></a> -->
                    </div>
                    <!-- <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ $info->nama_pemilik }}</small></a></div> -->
                    <h3 class="fw-bold text-black">Nama Toko: <br> {{ $info->nama_toko }} </h3><br>
                    <h3 class="fw-bold text-black">Nama Pemilik: <br> {{ $info->nama_pemilik }} </h3><br>
                    <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Ringkasan Toko: <br> {{ $info->deskripsi }}</a></h2> <br>
                    <!-- <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Email: <br> {{ $info->email }}</a></h2> <br> -->
                    <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Instagram: <br> {{ $info->akun_ig }}</a></h2> <br>
                    <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Facebook: <br> {{ $info->akun_fb }}</a></h2> <br>
                    <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Tiktok: <br> {{ $info->akun_tiktok }}</a></h2> <br>
                </div>
            </div>
        </div>
    </div>

    </div>
</section><br><br><br><br>

@endsection