<?php

use App\Http\Controllers\EtalaseProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProductController;
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
    });

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
            Route::get('/show', [ProductController::class, 'show'])->name('product.show');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
            Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::delete('/destroy/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        });

        // CRUD Information
        Route::prefix( '/information' )->group( function(){
            Route::get('/', [InformationController::class,'index'])->name('information.index');
            Route::get('/edit', [InformationController::class , 'edit'] )->name('information.edit');
            Route::put('/update', [InformationController::class, 'update'])->name('information.update');
        });
    });
});
