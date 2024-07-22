<div class="h-100" id="leftside-menu-container" data-simplebar>

    <!--- Sidemenu -->
    <ul class="side-nav">
        <li class="side-nav-title side-nav-item"></li>
        <li class="side-nav-item">
            <a href="{{ route('home.admin') }}" class="side-nav-link">
                <i class="uil-dashboard"></i>
                <span>Dashboard </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{ route('home') }}" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span> Home Customer </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a href="{{ route('information.index') }}" class="side-nav-link">
                <i class="uil-shop"></i>
                <span> Informasi Toko </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel" class="side-nav-link">
                <i class="uil-users-alt"></i>
                <span> Pengguna </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarSecondLevel">
                <ul class="side-nav-third-level">
                    <li>
                        <a href="{{ route('user.index') }}">Admin</a>
                    </li>
                    <li>
                        <a href="{{ route('customer.index') }}">Customer</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="side-nav-item">
            <a href="{{ route('product.index') }}" class="side-nav-link">
                <i class="uil-cart"></i>
                <span> Produk </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel" class="side-nav-link">
                <i class="uil-bill"></i>
                <span> Pesanan </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarThirdLevel">
                <ul class="side-nav-third-level">
                    <li>
                        <a href="{{ route('masuk.index') }}">Pesanan Masuk</a>
                    </li>
                    <li>
                        <a href="{{ route('diproses.index') }}">Pesanan Diproses</a>
                    </li>
                    <li>
                        <a href="{{ route('riwayat.index') }}">Riwayat</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarEmail" aria-expanded="false" aria-controls="sidebarEmail" class="side-nav-link">
                <i class="uil-clipboard-notes"></i>
                <span> Laporan </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarEmail">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="{{ route('laporan.harian') }}">Harian</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.mingguan') }}">Mingguan</a>
                    </li>
                    <li>
                        <a href="{{ route('laporan.bulanan') }}">Bulanan</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="side-nav-item">
            <a href="{{ route('logout') }}" class="side-nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="mdi mdi-logout me-1"></i>
                <span> Logout </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
    <!-- End Sidebar -->

</div>