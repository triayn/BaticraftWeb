<?php

use App\Http\Controllers\UserController;
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

Route::get('user/index', [UserController::class, 'index'])->name('user.index');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');

// Route Cek Tampilan 
// Route::view('index','admin.users.index')->name('user.index');
// Route::view('create','admin.users.create')->name('user.create');
// Route::view('show','admin.users.show')->name('user.show');
// Route::view('edit','admin.users.edit')->name('user.edit');