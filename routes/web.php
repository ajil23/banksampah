<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/menu', function () {
        return view('admin.index');
    })->name('menu');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
Route::prefix('transaksi')->group(function () {
    Route::get('/tagihan', [AdminController::class, 'tagihan'])->name('tagihan.view');
    Route::get('/detailtagihan', [AdminController::class, 'detagihan'])->name('detagihan.view');
});
Route::prefix('pengguna')->group(function () {
    Route::get('/dawis', [AdminController::class, 'dawis'])->name('dawis.view');
    Route::get('/nasabah', [AdminController::class, 'nasabah'])->name('nasabah.view');
    Route::get('/add_nasabah', [AdminController::class, 'add_nasabah'])->name('add_nasabah.view');
    Route::get('/petugas', [AdminController::class, 'petugas'])->name('petugas.view');
    Route::get('/tabungan', [AdminController::class, 'tabungan'])->name('tabungan.view');
});
