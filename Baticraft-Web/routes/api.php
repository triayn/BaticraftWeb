<?php

use App\Http\Controllers\MobileApi\InformationController;
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

Route::group(['prefix' => '/MobileApi'], function () {

    //Users Controller
    Route::post('/LoginMobile', [LoginMobileController::class, 'login']);
    Route::post('/DetailProfil', [LoginMobileController::class, 'detailprofil']);
    Route::post('/UbahPassword', [LoginMobileController::class, 'updatePassword']);
    Route::post('/checkCurrentPassword', [LoginMobileController::class, 'checkCurrentPassword']);
    Route::post('/EditProfil', [LoginMobileController::class, 'update']);
    Route::post('/UploadGambarUser', [LoginMobileController::class, 'uploadFoto']);

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

    //Transaksi Controller
    Route::post('/insertNew', [TransactionController::class, 'insertNew']);
    Route::post('/searchTransaksi', [TransactionController::class, 'search']);
    Route::get('/showCompletedTransactions', [TransactionController::class, 'showCompletedTransactions']);
    Route::post('/showTransactionAndDetails', [TransactionController::class, 'showTransactionAndDetails']);
});
