
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Masukan;
use App\Http\Controllers\NasabahController;

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
    // config('jetstream.auth_session'),
    // 'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::middleware([
    'auth:sanctum',
    // config('jetstream.auth_session'),
    // 'verified'
])->group(function () {
    Route::get('/menu', function () {
        return view('admin.index');
    })->name('menu');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
Route::prefix('transaksi')->group(function () {
    Route::get('/tagihan', [AdminController::class, 'tagihan'])->name('tagihan.view');
    Route::get('/detailtagihan', [Masukan::class, 'detagihan'])->name('detagihan.view');
});
Route::prefix('pengguna')->group(function () {
    //nasabah
    Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah.view');
    Route::get('/add_nasabah',[NasabahController::class, 'create'])->name('add_nasabah.view');
    Route::get('/edit_nasabah/{id}',[NasabahController::class, 'edit'])->name('nasabah.edit');
    Route::put('/update_nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::post('/tambah_nasabah',[NasabahController::class, 'store'])->name('nasabah.store');
    Route::get('/deleteNasabah/{id}', [NasabahController::class, 'destroy'])->name('nasabah.delete');
    //endnasabah
    //dawis
    Route::get('/dawis', [AdminController::class, 'dawis'])->name('dawis.view');
    Route::get('/add_dawis', [AdminController::class, 'add_dawis'])->name('add_dawis.view');
    Route::post('/tambah_dawis', [AdminController::class, 'tambah_dawis'])->name('tambah_dawis');
    Route::get('/deleteDawis/{id}', [AdminController::class, 'dawisDelete'])->name('dawis.delete');
    Route::get('/edit_dawis/{id}', [AdminController::class, 'edit_dawis'])->name('dawis.edit');
    Route::post('/update_dawis/{id}', [AdminController::class, 'dawisUpdate'])->name('dawis.update');
    //endawis
    //petugas
    Route::get('/petugas', [AdminController::class, 'petugas'])->name('petugas.view');
    Route::get('/add_petugas', [AdminController::class, 'add_petugas'])->name('add_petugas.view');
    Route::post('/tambah_petugas', [AdminController::class, 'tambah_petugas'])->name('tambah_petugas');
    Route::get('/deletePetugas/{id}', [AdminController::class, 'petugasDelete'])->name('petugas.delete');
    Route::get('/edit_petugas/{id}', [AdminController::class, 'edit_petugas'])->name('edit_petugas');
    Route::post('/update_petugas/{id}', [AdminController::class, 'petugasUpdate'])->name('petugas.update');
    //endpetugas
    Route::get('/tabungan', [AdminController::class, 'tabungan'])->name('tabungan.view');
    Route::get('/edit/{id}', [AdminController::class, 'editData'])->name('edit.view');
    
});
Route::prefix('sampah')->group(function () {
    //sampah
    Route::get('/daftarsampah', [AdminController::class, 'daftarsampah'])->name('sampah.view');
    Route::get('/add_sampah', [AdminController::class, 'add_sampah'])->name('add_sampah.view');
    Route::get('/deleteSampah/{id}', [AdminController::class, 'sampahDelete'])->name('sampah.delete');
    Route::get('/editSampah/{id}', [AdminController::class, 'sampahEdit'])->name('sampah.edit');
    Route::post('/updatesampah/{id}', [AdminController::class, 'sampahUpdate'])->name('sampah.update');
    Route::post('/tambah_sampah', [AdminController::class, 'tambah_sampah'])->name('tambah_sampah');
});
Route::prefix('tagihan')->group(function(){
    //tagihan
    Route::get('/masuk_saldo', [Masukan::class, 'masukSaldo'])->name('page.masuk');
    Route::get('/keluar_saldo', [Masukan::class, 'keluarSaldo'])->name('page.keluar');
    Route::get('/masuk', [Masukan::class, 'transaksiDawis'])->name('tagihan.view');
    Route::get('/detail', [Masukan::class, 'detagihan'])->name('masukanDawis.view');
    Route::post('/tambahSaldoDawis', [Masukan::class,'add_masuk'])->name('tambahSaldoDawis');
    Route::get('/masuk_nasabah',[Masukan::class, 'detagihanNasabah'])->name('tambahSaldoNasabah.view');
    Route::get('/masuk_saldo_nasabah',[Masukan::class, 'masukSaldoNasabah'])->name('tambahSaldoNasabah.add');
    Route::post('/tambah_saldo_nasabah',[Masukan::class, 'add_masukNasabah'])->name('add.SaldoNasabah');
    Route::get('/tambah_saldo_petugas',[Masukan::class, 'detagihanPetugas'])->name('saldoPetugas.view');
    Route::get('/masuk_saldo_petugas', [Masukan::class, 'masukSaldoPetugas'])->name('tambahSaldoPetugas.add');
    Route::post('/tambah_saldo_petugas', [Masukan::class, 'add_masukPetugas'])->name('add.SaldoPetugas');
    Route::get('/keluar', [Masukan::class, 'detagihanDawis'])->name('kurangSaldoDawis.view');
    Route::get('/keluar_saldo_dawis', [Masukan::class, 'pageKeluarSaldoDawis'])->name('keluarSaldoDawis.view');
    Route::post('kurang_saldo_dawis',[Masukan::class, 'KeluarSaldoDawis'])->name('kurangSaldoDawis.add');
});
Route::prefix('penduduk')->group(function () {
    //sampah
    Route::get('/daftarpenduduk', [AdminController::class, 'daftarPenduduk'])->name('penduduk.view');
    Route::get('/tambahpenduduk', [AdminController::class, 'tambahPenduduk'])->name('tambahPenduduk.view');
    Route::get('/deletependuduk/{id}', [AdminController::class, 'deletePenduduk'])->name('penduduk.delete');
    Route::get('/editpenduduk/{id}', [AdminController::class, 'editPenduduk'])->name('penduduk.edit');
    Route::post('/updatependuduk/{id}', [AdminController::class, 'updatePenduduk'])->name('penduduk.update');
    Route::post('/pendudukBaru', [AdminController::class, 'pendudukBaru'])->name('pendudukBaru');
});

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');