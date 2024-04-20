<ul id="navbar">
  <li><a href="index.html">Home</a></li>
  <li><a href="{{ route('etalase.product') }}">Etalase Produk</a></li>
  <li><a href="product-details.html">Keranjang</a></li>
  <li><a href="cart.html">Pesanan</a></li>
  <li><a href="checkout.html">Informasi Toko</a></li>
  <li><a href="checkout.html">Profil</a></li>
  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
</ul>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>

<!-- <div class="container"><a class="navbar-brand me-3 me-xl-4" href="real-estate-home-v1.html">BATICRAFT</a>
  <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
    <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
      <li class="nav-item dropdown active"><a class="nav-link" href="#" role="button" aria-expanded="false">Home</a>
      </li>
      <li class="nav-item dropdown"><a class="nav-link" href="#" role="button" aria-expanded="false">Etalase Produk</a>
      </li>
      <li class="nav-item dropdown"><a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Keranjang</a>
      </li>
      <li class="nav-item dropdown"><a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pesanan</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="real-estate-add-property.html">Diproses</a></li>
          <li><a class="dropdown-item" href="real-estate-property-promotion.html">Selesai</a></li>
          <li><a class="dropdown-item" href="real-estate-vendor-properties.html">Ditolak</a></li>
        </ul>
      </li>
      <li class="nav-item dropdown"><a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi Toko</a>
      </li>
      <li class="nav-item dropdown"><a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="real-estate-add-property.html">Informasi Akun</a></li>
          <li><a class="dropdown-item" href="real-estate-property-promotion.html">Ganti Kata Sandi</a></li>
          <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Keluar</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div> -->