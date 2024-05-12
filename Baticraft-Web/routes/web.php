<?php

use App\Http\Controllers\EtalaseProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\PesananCustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/cek', function () {
    return view('customer.layouts.main');
});

// LandingPage
Route::get('/', [LandingpageController::class, 'index'])->name('page.satu');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'pembeli'])->name('home');

    // Etalase product
    Route::prefix('/EtalaseProduct')->group(function () {
        Route::get('/semua', [EtalaseProductController::class, 'index'])->name('etalase.index');
        Route::get('/kain', [EtalaseProductController::class, 'kain'])->name('etalase.kain');
        Route::get('/kemeja', [EtalaseProductController::class, 'kemeja'])->name('etalase.kemeja');
        Route::get('/kaos', [EtalaseProductController::class, 'kaos'])->name('etalase.kaos');
        Route::get('/detail/{id}', [EtalaseProductController::class, 'detail'])->name('etalase.detail');
    });

    // Keranjang
    Route::prefix('/keranjang')->group(function () {
        Route::get('/', [KeranjangController::class, 'cart'])->name('keranjang.index');
        Route::post('/add', [KeranjangController::class, 'addToCart'])->name('keranjang.add');
        Route::put('/update/{id}', [KeranjangController::class, 'updateQuantity'])->name('keranjang.update');
        Route::delete('/destroy/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.delete');
        Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('keranjang.checkout');
    });

    // Pesanan
    Route::prefix('/pesanan')->group(function () {
        Route::get('/', [PesananCustomerController::class, 'index'])->name('pesanan.index');
        Route::get('/detail/{id}', [PesananCustomerController::class, 'detail'])->name('pesanan.detail');
        // Route::get('/diproses', [PesananCustomerController::class, 'diproses'])->name('pesanan.diproses');
        // Route::get('/ditolak', [PesananCustomerController::class, 'ditolak'])->name('pesanan.ditolak');
        // Route::get('/selesai', [PesananCustomerController::class, 'selesai'])->name('pesanan.selesai');
    });

    Route::prefix('/profil')->group(function () {
        Route::get('/customer', [ProfilController::class, 'indexCustomer'])->name('profil.cutomer');
        Route::get('/edit', [ProfilController::class, 'editCustomer'])->name('profil.customer.edit');
        Route::put('/{id}', [ProfilController::class, 'update'])->name('profil.update');
        Route::put('/change-password/{id}', [ProfilController::class, 'changePassword'])->name('profil.change.password');
        // Route::put('/update', [ProfilController::class, 'updateCustomer'])->name('profil.customer.update');
        Route::get('/ganti', [ProfilController::class, 'gantiCustomer'])->name('profil.customer.ganti');
        // Route::post('/verifikasi', [ProfilController::class, 'verifikasiCustomer'])->name('profil.customer.verifikasi');
    });

    Route::get('/informasi/toko', [InformationController::class, 'customer'])->name('information.customer');

    // Rute yang hanya dapat diakses oleh pengguna dengan role 'admin'
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/home/admin', [HomeController::class, 'admin'])->name('home.admin');

        // CRUD User
        Route::prefix('/pengguna/admin')->group(function () {
            Route::get('/index', [UserController::class, 'index'])->name('user.index');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
            Route::get('/create', [UserController::class, 'create'])->name('user.create');
            Route::post('/store', [UserController::class, 'store'])->name('user.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.delete');
        });

        // CRUD Customer
        Route::prefix('/pengguna/customer')->group(function () {
            Route::get('/index', [UserController::class, 'index_customer'])->name('customer.index');
            Route::get('/show/{id}', [UserController::class, 'show'])->name('customer.show');
            Route::delete('/destroy/{id}', [UserController::class, 'destroy_customer'])->name('customer.delete');
        });

        // CRUD Product
        Route::prefix('/product')->group(function () {
            Route::get('/index', [ProductController::class, 'index'])->name('product.index');
            Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        });

        // CRUD Information
        Route::prefix('/information')->group(function () {
            Route::get('/', [InformationController::class, 'index'])->name('information.index');
            Route::get('/edit', [InformationController::class, 'edit'])->name('information.edit');
            Route::put('/update', [InformationController::class, 'update'])->name('information.update');
        });

        // CRUD Pesanan
        Route::prefix('/product')->group(function () {
            Route::get('/index', [ProductController::class, 'index'])->name('product.index');
            Route::get('/show/{id}', [ProductController::class, 'show'])->name('product.show');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        });

        // CRUD Pesanan Masuk
        Route::prefix('/pesanan/masuk')->group(function () {
            Route::get('/', [PesananController::class, 'masuk'])->name('masuk.index');
            Route::get('/konfirmasi/{id}', [PesananController::class, 'editMasuk'])->name('masuk.konfirmasi');
            Route::post('/konfirmasi/diterima', [PesananController::class, 'konfirmasiDiterima'])->name('konfirmasi.diterima');
            Route::post('/konfirmasi/ditolak', [PesananController::class, 'konfirmasiDitolak'])->name('konfirmasi.ditolak');
        });

        // CRUD Pesanan Diproses
        Route::prefix('/pesanan/diproses')->group(function () {
            Route::get('/', [PesananController::class, 'diproses'])->name('diproses.index');
            Route::get('/konfirmasi/{id}', [PesananController::class, 'editDiproses'])->name('diproses.konfirmasi');
            Route::post('/konfirmasi/selesai', [PesananController::class, 'konfirmasiSelesai'])->name('konfirmasi.selesai');
        });

        // CRUD Riwayat Pesanan
        Route::prefix('/riwayat')->group(function () {
            Route::get('/index', [PesananController::class, 'riwayat'])->name('riwayat.index');
            Route::get('/langsung/{id}', [PesananController::class, 'langsung'])->name('show.langsung');
            Route::get('/pesan/{id}', [PesananController::class, 'pesan'])->name('show.pesan');
            Route::get('/ditolak/{id}', [PesananController::class, 'ditolak'])->name('show.ditolak');
        });

        Route::prefix('/laporan')->group(function () {
            Route::get('/harian', [LaporanController::class, 'harian'])->name('laporan.harian');
            Route::get('/mingguan', [LaporanController::class, 'mingguan'])->name('laporan.mingguan');
            Route::get('/bulanan', [LaporanController::class, 'bulanan'])->name('laporan.bulanan');
            Route::get('/laporan/bulanan/detail', [LaporanController::class, 'detailLaporan'])->name('laporan.bulanan.detail');
        });

        // Profil
        Route::prefix('/profil')->group(function () {
            Route::get('/', [ProfilController::class, 'index'])->name('profil.index');
        });
    });
});
