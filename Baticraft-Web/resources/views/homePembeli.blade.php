@extends('customer.layouts.main')

@section('nav')
<ul id="navbar">
    <li class="active"><a href="{{ route('home') }}">Home</a></li>
    <li><a href="{{ route('etalase.index') }}">Etalase Produk</a></li>
    <li><a href="{{ route('keranjang.index') }}">Keranjang</a></li>
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
<div class="products-catagories-area clearfix">
    <div class="amado-pro-catagory clearfix">

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/customer/images/catalog-1.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga $180</p>
                    <h4>Modern Chair</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/pembeli/img/product-img/produk2.png') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga $180</p>
                    <h4>Minimalistic Plant Pot</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/pembeli/img/product-img/produk3.png') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga $180</p>
                    <h4>Modern Chair</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/pembeli/img/product-img/produk4.png') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga $180</p>
                    <h4>Night Stand</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/pembeli/img/product-img/produk1.png') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga $18</p>
                    <h4>Plant Pot</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/customer/images/catalog-2.jpg') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga $320</p>
                    <h4>Small Table</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/pembeli/img/product-img/produk3.png') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga Rp 176.000</p>
                    <h4>Metallic Chair</h4>
                </div>
            </a>
        </div>

        <!-- Single Catagory -->
        <div class="single-products-catagory clearfix">
            <a href="shop.html">
                <img src="{{ asset('assets/pembeli/img/product-img/produk4.png') }}" alt="">
                <!-- Hover Content -->
                <div class="hover-content">
                    <div class="line"></div>
                    <p>Harga Rp 176.000</p>
                    <h4>Modern Rocking Chair</h4>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection