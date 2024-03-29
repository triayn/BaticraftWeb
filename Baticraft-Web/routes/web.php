<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\ProdukController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// LandingPage
Route::get('/', [LandingpageController::class, 'index'])->name('page.satu');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'pembeli'])->name('home');


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

        // CRUD Produk
        Route::prefix('/produk')->group(function () {
            Route::get('/index', [ProdukController::class, 'index'])->name('produk.index');
            Route::get('/show/{id}', [ProdukController::class, 'show'])->name('produk.show');
            Route::get('/create', [ProdukController::class, 'create'])->name('produk.create');
            Route::post('/store', [ProdukController::class, 'store'])->name('produk.store');
            Route::get('/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
            Route::put('/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
            Route::delete('/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');
        });
    });
});
