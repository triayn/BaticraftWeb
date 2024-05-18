<?php

use App\Http\Controllers\API\InformationController as APIInformationController;
use App\Http\Controllers\API\KeranjangController;
use App\Http\Controllers\API\PesananController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ProfilController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\MobileApi\InformationController;
use App\Http\Controllers\MobileApi\KelolaPengguna;
use App\Http\Controllers\MobileApi\LoginMobileController;
use App\Http\Controllers\MobileApi\ProductsMobileController;
use App\Http\Controllers\MobileApi\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// User
Route::prefix('/pengguna')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('api.user.index');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('api.user.show');
    Route::post('/store', [UserController::class, 'store'])->name('api.user.store');
});

// Product 
Route::prefix('/product')->group(function () {
    Route::get('/index', [ProductController::class, 'index']);
    Route::get('/show/{id}', [ProductController::class, 'show']);
    Route::post('/store', [ProductController::class, 'store']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/destroy/{id}', [ProductController::class, 'destroy']);
});

// Keranjang
Route::prefix('keranjang')->group(function () {
    Route::get('/', [KeranjangController::class, 'cart'])->name('api.keranjang.index');
    Route::post('/add', [KeranjangController::class, 'addToCart'])->name('api.keranjang.add');
    Route::delete('/destroy/{id}', [KeranjangController::class, 'destroy'])->name('api.keranjang.delete');
    Route::post('/checkout', [KeranjangController::class, 'checkout'])->name('api.keranjang.checkout');
});

// Pesanan 
Route::prefix('pesanan')->group(function () {
    Route::get('/', [PesananController::class, 'index'])->name('api.pesanan.index');
    Route::get('/detail/{id}', [PesananController::class, 'detail'])->name('api.pesanan.detail');
    Route::post('/konfirmasi/diterima', [PesananController::class, 'konfirmasiDiterima'])->name('api.konfirmasi.diterima');
    Route::post('/konfirmasi/ditolak', [PesananController::class, 'konfirmasiDitolak'])->name('api.konfirmasi.ditolak');
    Route::post('/konfirmasi/selesai', [PesananController::class, 'konfirmasiSelesai'])->name('api.konfirmasi.selesai');
});

Route::prefix('information')->group(function () {
    Route::get('/', [APIInformationController::class, 'index'])->name('api.information.index');
    Route::put('/update', [APIInformationController::class, 'update'])->name('api.information.update');
});

// Profil
Route::prefix('profil')->group(function () {
    Route::get('/', [ProfilController::class, 'index'])->name('api.profil.index');
    Route::put('/{id}', [ProfilController::class, 'update'])->name('api.profil.update');
    Route::put('/change-password/{id}', [ProfilController::class, 'changePassword'])->name('api.profil.changePassword');
});

Route::group(['prefix' => '/MobileApi'], function () {

    //Users Controller
    Route::post('/LoginMobile', [LoginMobileController::class, 'login']);
    Route::post('/DetailProfil', [LoginMobileController::class, 'detailprofil']);
    Route::post('/UbahPassword', [LoginMobileController::class, 'updatePassword']);
    Route::post('/checkCurrentPassword', [LoginMobileController::class, 'checkCurrentPassword']);
    Route::post('/EditProfil', [LoginMobileController::class, 'update']);
    Route::post('/UploadGambarUser', [LoginMobileController::class, 'uploadFoto']);
    Route::post('/checkEmail', [LoginMobileController::class, 'checkEmail']);
    Route::post('/updatePasswordLupaSandi', [LoginMobileController::class, 'updatePasswordLupaSandi']);
    
    //informasi toko controller
    Route::get('/DetailInformasiMobile', [InformationController::class, 'show']);
    Route::post('/EditIformasiMobile', [InformationController::class, 'update']);
    Route::post('/UploadGambarInformasi', [InformationController::class, 'uploadFoto']);

    //produk controller
    Route::get('/showKain', [ProductsMobileController::class, 'getProductsKain']);
    Route::get('/showKaos', [ProductsMobileController::class, 'getProductsKaos']);
    Route::get('/showKemeja', [ProductsMobileController::class, 'getProductsKemeja']);
    Route::post('/deleteProduct', [ProductsMobileController::class, 'deleteProduct']);
    Route::post('/getDetailKain', [ProductsMobileController::class, 'getDetailKain']);
    Route::post('/getDetailKaos', [ProductsMobileController::class, 'getDetailKaos']);
    Route::post('/getDetailKemeja', [ProductsMobileController::class, 'getDetailKemeja']);
    Route::post('/upload_gambar_without_direktori', [ProductsMobileController::class, 'addImagesToProduct']);
    Route::post('/updateProduct', [ProductsMobileController::class, 'updateProduct']);
    Route::post('/insertProduk', [ProductsMobileController::class, 'store']);
    Route::get('/generateProductCode', [ProductsMobileController::class, 'generateProductCode']);
    Route::get('/semuaProduk', [ProductsMobileController::class, 'semua']);
    Route::post('/search', [ProductsMobileController::class, 'search']);
    Route::post('/searchKain', [ProductsMobileController::class, 'searchKain']);
    Route::post('/searchKemeja', [ProductsMobileController::class, 'searchKemeja']);
    Route::post('/searchKaos', [ProductsMobileController::class, 'searchKaos']);
    Route::get('/produkTerlaris', [ProductsMobileController::class, 'produkTerlaris']);
    
    //Transaksi Controller
    Route::post('/insertNew', [TransactionController::class, 'insertNew']);
    Route::post('/searchTransaksi', [TransactionController::class, 'search']);
    Route::get('/showCompletedTransactions', [TransactionController::class, 'showCompletedTransactions']);
    Route::post('/showTransactionAndDetails', [TransactionController::class, 'showTransactionAndDetails']);
    Route::get('/pendapatanHariIni', [TransactionController::class, 'pendapatanHariIni']);
    Route::post('/pendapatanJangkaWaktu', [TransactionController::class, 'pendapatanJangkaWaktu']);
    Route::post('/pendapatanBulanan', [TransactionController::class, 'pendapatanBulanan']);
    Route::get('/getTransactionData', [TransactionController::class, 'getTransactionData']);
    Route::get('/getTransactionDataLimit', [TransactionController::class, 'getTransactionDataLimit']);
    Route::post('/tolakPesanan', [TransactionController::class, 'tolakPesanan']);
    Route::post('/prosesPesanan', [TransactionController::class, 'prosesPesanan']);
    Route::post('/getCariTransactionData', [TransactionController::class, 'getCariTransactionData']);
    Route::post('/PesananDiambil', [TransactionController::class, 'PesananDiambil']);

    Route::post('/searchSelesai', [TransactionController::class, 'searchSelesai']);
    Route::post('/searchTolak', [TransactionController::class, 'searchTolak']);
    Route::post('/searchProses', [TransactionController::class, 'searchProses']);

    Route::get('/showRiwayatTolak', [TransactionController::class, 'showRiwayatTolak']);
    Route::get('/showRiwayatProses', [TransactionController::class, 'showRiwayatProses']);
    Route::get('/showRiwayatSelesai', [TransactionController::class, 'showRiwayatSelesai']);
    
    //Kelola Pengguna
    Route::post('/getKelolaPenguna', [KelolaPengguna::class, 'getSemua']);
    Route::post('/getCariPengguna', [KelolaPengguna::class, 'search']);
    Route::post('/tambahAdmin', [KelolaPengguna::class, 'insert']);


});