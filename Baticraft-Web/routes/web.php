<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

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

// Rute yang hanya dapat diakses oleh pengguna dengan role 'admin'
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/home/admin', [HomeController::class, 'admin'])->name('home.admin');
});

// Rute yang hanya dapat diakses oleh pengguna dengan role 'pembeli'
Route::middleware(['auth', 'role:pembeli'])->group(function () {
    Route::get('/home/pembeli', [HomeController::class, 'pembeli'])->name('home.pembeli');
});


// Route::get('user/index', [UserController::class, 'index'])->name('user.index');
// Route::get('user/create', [UserController::class, 'create'])->name('user.create');

// Route Cek Tampilan 
// Route::view('index','admin.users.index')->name('user.index');
// Route::view('create','admin.users.create')->name('user.create');
// Route::view('show','admin.users.show')->name('user.show');
// Route::view('edit','admin.users.edit')->name('user.edit');
