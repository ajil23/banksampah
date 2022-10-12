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
    //nasabah
    Route::get('/nasabah', [AdminController::class, 'nasabah'])->name('nasabah.view');
    Route::get('/add_nasabah',[AdminController::class, 'add_nasabah'])->name('add_nasabah.view');
    Route::get('/edit_nasabah/{id}',[AdminController::class, 'edit_nasabah'])->name('edit_nasabah');
    Route::post('/update_nasabah/{id}', [AdminController::class, 'nasabahUpdate'])->name('nasabah.update');
    Route::post('/tambah_nasabah',[AdminController::class, 'tambah_nasabah'])->name('tambah_nasabah');
    Route::get('/deleteNasabah/{id}', [AdminController::class, 'nasabahDelete'])->name('nasabah.delete');
    //endnasabah
    //dawis
    Route::get('/dawis', [AdminController::class, 'dawis'])->name('dawis.view');
    Route::get('/add_dawis', [AdminController::class, 'add_dawis'])->name('add_dawis.view');
    Route::post('/tambah_dawis', [AdminController::class, 'tambah_dawis'])->name('tambah_dawis');
    Route::get('/deleteDawis/{id}', [AdminController::class, 'dawisDelete'])->name('dawis.delete');
    //endawis
    Route::get('/petugas', [AdminController::class, 'petugas'])->name('petugas.view');
    Route::get('/tabungan', [AdminController::class, 'tabungan'])->name('tabungan.view');
    Route::get('/edit/{id}', [AdminController::class, 'editData'])->name('edit.view');
    
});
Route::prefix('sampah')->group(function () {
    //sampah
    Route::get('/daftarsampah', [AdminController::class, 'daftarsampah'])->name('sampah.view');
    Route::get('/add_sampah', [AdminController::class, 'add_sampah'])->name('add_sampah.view');
    Route::get('/deleteSampah/{id}', [AdminController::class, 'sampahDelete'])->name('sampah.delete');
    Route::get('/editSampah/{id}', [AdminController::class, 'sampahEdit'])->name('sampah.edit');
    Route::post('/tambah_sampah', [AdminController::class, 'tambah_sampah'])->name('tambah_sampah');
});
