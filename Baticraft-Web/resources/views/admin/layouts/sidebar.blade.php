<div class="h-100" id="leftside-menu-container" data-simplebar>

    <!--- Sidemenu -->
    <ul class="side-nav">
        <li class="side-nav-title side-nav-item"></li>
        <li class="side-nav-item">
            <a href="apps-calendar.html" class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span>Dashboard </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarSecondLevel" aria-expanded="false" aria-controls="sidebarSecondLevel" class="side-nav-link" >
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
            <a href="{{ route('produk.index') }}" class="side-nav-link">
                <i class="uil-cart"></i>
                <span> Produk </span>
            </a>
        </li>
        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel" class="side-nav-link">
                <i class="uil-bill"></i>
                <span> Transaksi </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarThirdLevel">
                <ul class="side-nav-third-level">
                    <li>
                        <a href="javascript: void(0);">Pesanan</a>
                    </li>
                    <li>
                        <a href="javascript: void(0);">Riwayat</a>
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
                        <a href="apps-email-inbox.html">Harian</a>
                    </li>
                    <li>
                        <a href="apps-email-read.html">Bulanan</a>
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