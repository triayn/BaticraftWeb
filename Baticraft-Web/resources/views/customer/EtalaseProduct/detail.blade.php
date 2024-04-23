@extends('customer.layouts.main')

@section('nav')
<ul id="navbar">
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('etalase.index') }}">Etalase Produk</a></li>
    <li class="active"><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
    <li><a href="cart.html">Pesanan</a></li>
    <li><a href="{{ route('information.customer') }}">Informasi Toko</a></li>
    <li><a href="checkout.html">Profil</a></li>
    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</ul>
@endsection

@section('content')
<!-- Product Details Area Start -->
<div class="single-product-area section-padding-100 clearfix">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="single_product_thumb">
                    <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/pro-big-1.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(img/product-img/pro-big-2.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="2" style="background-image: url(img/product-img/pro-big-3.jpg);">
                            </li>
                            <li data-target="#product_details_slider" data-slide-to="3" style="background-image: url(img/product-img/pro-big-4.jpg);">
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a class="gallery_img" href="img/product-img/pro-big-1.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-1.jpg" alt="First slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                </a>
                            </div>
                            <div class="carousel-item">
                                <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                    <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="single_product_desc">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price">{{ $data->harga }}</p>
                        <a href="product-details.html">
                            <h6>{{ $data->nama }}</h6>
                        </a>
                        <!-- Ratings & Review -->
                        <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                            <div class="ratings">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </div>
                            <div class="review">
                                <a href="#">{{ $data->kategori }}</a>
                            </div>
                        </div>
                        <!-- Avaiable -->
                        <p class="avaibility"><i class="fa fa-circle"></i> {{ $data->status }}</p>
                    </div>

                    <div class="short_overview my-5">
                        <p>{{ $data->deskripsi }}</p>
                    </div>

                    <!-- Add to Cart Form -->
                    <form class="cart clearfix" method="post">
                        <div class="cart-btn d-flex mb-50">
                            <p>Stok: {{ $data->stok }}</p>
                        </div>
                        <button type="submit" name="addtocart" value="5" class="btn amado-btn">Masukkan Keranjang</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection