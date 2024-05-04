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
  <div class="border-bottom pb-5">
    <nav class="navbar navbar-light py-lg-5 pt-3 px-0 pb-0">
      <div class="container">
        <div class="row w-100 align-items-center g-3">
          <div class="col-xxl-2 col-lg-3">
            <a class="navbar-brand d-none d-lg-block" href="index.html">
              <img src="{{ asset('assets/admin/images/logo.png') }}" alt="eCommerce HTML Template">

            </a>
            <div class="d-flex justify-content-between w-100 d-lg-none">
              <a class="navbar-brand" href="#">
                <img src="{{ asset('assets/admin/images/logo.png') }}" alt="eCommerce HTML Template">
              </a>

              <div class="d-flex align-items-center lh-1">

                <div class="list-inline me-2">
                  <div class="list-inline-item">

                    <a href="#!" class="text-muted" data-bs-toggle="modal" data-bs-target="#userModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                      </svg>
                    </a>
                  </div>
                  <div class="list-inline-item">

                    <a class="text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" href="#offcanvasExample" role="button" aria-controls="offcanvasRight">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                      </svg>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </nav>
  </div>

  <section class="mt-8">
    <div class="container">
      <div class="hero-slider ">
        <div style="background: url('assets/customer/images/slider/slider-1.png') no-repeat; background-size: 
      cover; border-radius: .5rem; background-position: center;">
          <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
            <span class="badge text-bg-warning">Batik Khas Nganjuk</span>

            <h2 class="text-dark display-5 fw-bold mt-4">Tetap Trendi <br> Dengan Batik </h2>
            <p class="lead">Rayakan Cinta Pada Produk Dalam Negeri Dengan Melestarikan Batik!.</p>
            <a href="{{ route('login') }}" class="btn btn-dark mt-3">Masuk <i class="feather-icon icon-arrow-right ms-1"></i></a>
          </div>

        </div>
        <div class=" " style="background: url('assets/customer/images/slider/slider-2.png') no-repeat; background-size: cover; 
      border-radius: .5rem; background-position: center;">
          <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
            <span class="badge text-bg-warning">Motif yang khas dan beragam</span>
            <h2 class="text-dark display-5 fw-bold mt-4">Keunikan <br> Motifnya</h2>
            <p class="lead">Batik adalah kekayaan budaya yang tidak bisa diabaikan.
            </p>
            <a href="{{ route('login') }}" class="btn btn-dark mt-3">Masuk <i class="feather-icon icon-arrow-right ms-1"></i></a>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- Category Section Start-->
  <section class="mb-lg-10 mt-lg-14 my-8">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-6">

          <h3 class="mb-0">Kategori Produk</h3>

        </div>
      </div>
      <div class="category-slider ">
        <div class="item"> <a href="pages/shop-grid.html" class="text-decoration-none text-inherit">
            <div class="card card-product mb-4">
              <div class="card-body text-center py-8">
                <img src="{{ asset('assets/customer/images/category/kain.png') }}" class="mb-3 img-fluid">
                <div>Kain Batik</div>
              </div>
            </div>
          </a></div>
        <div class="item"> <a href="pages/shop-grid.html" class="text-decoration-none text-inherit">
            <div class="card card-product mb-4">
              <div class="card-body text-center py-8">
                <img src="{{ asset('assets/customer/images/category/kemeja.png') }}" class="mb-3">
                <div>Kemeja</div>
              </div>
            </div>
          </a></div>
        <div class="item"> <a href="pages/shop-grid.html" class="text-decoration-none text-inherit">
            <div class="card card-product mb-4">
              <div class="card-body text-center py-8">
                <img src="{{ asset('assets/customer/images/category/kaos.png') }}" alt="Grocery Ecommerce Template" class="mb-3">
                <div>Kemeja</div>
              </div>
            </div>
          </a></div>
      </div>


    </div>
  </section>

  <section>
    <div class="container">
      @foreach ($info as $toko)
      <div class="row">
        <div class="col-12 col-lg-6 mb-3 mb-lg-0">
          <div class="py-10 px-8 rounded-3" style="background: url('assets/customer/images/banner/banner-1.png') no-repeat; background-size: cover; background-position: center;">
            <div>
              <h3 class="fw-bold mb-1">Custome Desain Batik</h3>
              <p class="mb-4">Hubungi Pemilik Toko</p>
              <a href="https://wa.me/{{ $toko->no_telpon }}" class="btn btn-dark">Dan Lakukan Diskusi Lebih Lanjut</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="py-10 px-8 rounded-3" style="background: url('assets/customer/images/banner/banner-2.png') no-repeat; background-size: cover; background-position: center;">
            <div>
              <h3 class="fw-bold mb-1">Pesan Dalam Jumlah Banyak</h3>
              <p class="mb-4">Lihat Stok Produk Terlebih Dahulu</p>
              <a href="{{ $toko->lokasi }}" class="btn btn-dark">Atau Langsung Hubungi Pemilik Toko</a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>


  <!-- Popular Products Start-->
  <section class="my-lg-14 my-8">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-6">
          <h3 class="mb-0">Produk Terbaru</h3>
        </div>
      </div>

      <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
        @foreach ($data as $row)
        <div class="col">
          <div class="card card-product">
            <div class="card-body">

              <div class="text-center position-relative ">
                <!-- img -->
                @if($images->isNotEmpty())
                @foreach($images as $image)
                @if($image->product_id == $row->id)
                <a href="#!"> <img src="{{ asset('storage/product/' . $image->image_path) }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>
                @break
                @endif
                @endforeach
                @endif
                <!-- <a href="#!"> <img src="{{ asset('assets/customer/images/products/product-img-1.jpg') }}" alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a> -->
              </div>
              <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ $row->kategori }}</small></a></div>
              <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ $row->nama }}</a></h2>
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div><span class="text-dark">Rp {{ number_format($row->harga, 0, ',', '.') }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-6">
          <h3 class="mb-0">Informasi Toko</h3>
        </div>
      </div>
      @foreach ($info as $toko)
      <div class="row row-cols-lg-2 row-cols-1 row-cols-md-2 g-4">
        <div class="col">
          <div class="pt-8 px-8 rounded-3" style="background: url('{{ asset('storage/information/' . $toko->image) }}') no-repeat; 
        background-size: cover; height: 470px;">
            <div>
              <h3 class="fw-bold text-white">{{ $toko->alamat }}
              </h3><br>
              <p class="text-white">No. Handphone: {{ $toko->no_telpon }}</p>
              <p class="text-white">Email: {{ $toko->email }}</p>
              <br><br><br>
              <!-- <a href="#!" class="btn btn-primary">Kunjungi Sekarang <i class="feather-icon icon-arrow-right ms-1"></i></a> -->
              <a href="{{ $toko->lokasi }}" class="btn btn-primary">Kunjungi Sekarang <i class="feather-icon icon-arrow-right ms-1"></i></a>
            </div>
          </div>
        </div>
        <div class="col">

          <div class="card card-product">
            <div class="card-body">
              <!-- <div class="text-center  position-relative "> <a href="#!"><img src="{{ asset('storage/information/' .$toko->image) }}" class="mb-3 img-fluid"></a> -->
            </div>
            <!-- <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{ $toko->nama_pemilik }}</small></a></div> -->
            <h3 class="fw-bold text-black">Nama Toko: <br> {{ $toko->nama_toko }} </h3><br>
            <h3 class="fw-bold text-black">Nama Pemilik: <br> {{ $toko->nama_pemilik }} </h3><br>
            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Ringkasan Toko: <br> {{ $toko->deskripsi }}</a></h2> <br>
            <!-- <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Email: <br> {{ $toko->email }}</a></h2> <br> -->
            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Instagram: <br> {{ $toko->akun_ig }}</a></h2> <br>
            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Facebook: <br> {{ $toko->akun_fb }}</a></h2> <br>
            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">Tiktok: <br> {{ $toko->akun_tiktok }}</a></h2> <br>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    </div>
  </section><br><br><br><br>

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