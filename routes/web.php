
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportControlller;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\Masukan;
use App\Http\Controllers\NasabahController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TabunganController;
use App\Models\detailMasukan;
use App\Models\nasabah;
use App\Models\Penduduk;
use Illuminate\Support\Facades\DB;

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
        $penduduks = Penduduk::count();
        $nasabahs = nasabah::count();

        $nasabah = (new nasabah())->getTable();
        $penduduk = (new penduduk())->getTable();

        $bulan = detailMasukan::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->where(DB::raw('YEAR(created_at)'), '=', '2022')
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('bulan');

        $total_harga = detailMasukan::select(DB::raw("CAST(SUM(sub_harga) as int) as total_harga"))
        ->where(DB::raw('YEAR(created_at)'), '=', '2022')
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_harga');

        $jumlahPenduduk = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
        ->whereNotIn('id', function ($query) {
            $query->select('penduduk_id')->from('nasabah');
        })
        ->count();

        $jumlahNasabah = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
        ->whereIn('id', function ($query) {
            $query->select('penduduk_id')->from('nasabah');
        })
        ->count();
        $jumlahPetugas = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
        ->whereIn('id', function ($query) {
            $query->select('penduduk_id')->from('petugas');
        })->count();
        return view('admin.index', compact('penduduks', 'nasabahs','jumlahPenduduk','bulan','total_harga','jumlahNasabah', 'jumlahPetugas'));
    })->name('dashboard');
});
// Route::middleware([
//     'auth:sanctum',
//     // config('jetstream.auth_session'),
//     // 'verified'
// ])->group(function () {
//     Route::get('/menu', function () {
//         return view('admin.index');
//     })->name('menu');
// });

Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
Route::prefix('transaksi')->group(function () {
    Route::get('/tagihan', [AdminController::class, 'tagihan'])->name('tagihan.view');
    Route::get('/detailtagihan', [Masukan::class, 'detagihan'])->name('detagihan.view');
});
Route::prefix('pengguna')->group(function () {
    //nasabah
    Route::get('/nasabah', [NasabahController::class, 'index'])->name('nasabah.view');
    Route::get('/add_nasabah', [NasabahController::class, 'create'])->name('add_nasabah.view');
    Route::get('/edit_nasabah/{id}', [NasabahController::class, 'edit'])->name('nasabah.edit');
    Route::put('/update_nasabah/{id}', [NasabahController::class, 'update'])->name('nasabah.update');
    Route::post('/tambah_nasabah', [NasabahController::class, 'store'])->name('nasabah.store');
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
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.view');
    Route::get('/add_petugas', [PetugasController::class, 'create'])->name('add_petugas.view');
    Route::post('/tambah_petugas', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/deletePetugas/{id}', [PetugasController::class, 'destroy'])->name('petugas.delete');
    Route::get('/edit_petugas/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
    Route::put('/update_petugas/{id}', [PetugasController::class, 'update'])->name('petugas.update');
    //endpetugas
    Route::get('/tabungan', [TabunganController::class, 'tabungan'])->name('tabungan.view');
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
Route::get('/ajax_pembayaran', [Masukan::class, 'ajax']);
Route::get('/ajax', [Masukan::class, 'ajax2']);
Route::prefix('tagihan')->group(function () {
    //tagihan
    Route::get('/masuk_saldo', [Masukan::class, 'masukSaldo'])->name('page.masuk');
    Route::get('/keluar_saldo', [Masukan::class, 'keluarSaldo'])->name('page.keluar');
    Route::get('/masuk', [Masukan::class, 'transaksi'])->name('tagihan.view');
    Route::get('/masuk_saldo_nasabah', [Masukan::class, 'masukSaldoNasabah'])->name('tambahSaldoNasabah.add');
    Route::get('/kurang_saldo', [Masukan::class, 'pengambilanSampah'])->name('kurangSaldo.view');
    Route::get('/keluar_saldo_nasabah', [Masukan::class, 'pageKeluarSaldo'])->name('keluarSaldo.view');
    Route::post('/add_kurang_saldo', [Masukan::class, 'kurangSaldo'])->name('kurangSaldo.add');
    Route::post('/add_saldo', [Masukan::class, 'detailTransaksi'])->name('saldo.add');
    Route::get('/detail/{kode_id}', [Masukan::class, 'detail'])->name('detail.view');
    Route::get('/data_cash', [Masukan::class, 'viewCash'])->name('cash.view');
    Route::get('/cashStore', [Masukan::class, 'indexCash'])->name('cash.store');
    Route::post('/tambah_cash', [Masukan::class, 'addCash'])->name('cash.add');
    Route::get('/struk_cash/{id}', [Masukan::class, 'strukCash'])->name('strukTagihan.view');
    Route::get('/struk_tagihan/{id}', [Masukan::class, 'strukTagihan'])->name('strukSaldo.view');       //f
    Route::get('/cetakstruk/{id}', [Masukan::class, 'generatestruk'])->name('cetakstruk.view');   //f
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

Route::get('/test', [GrafikController::class, 'grafik']);

Route::get('dataRiwayat', [ExportControlller::class,'export'])->name('riwayat.export');
Route::get('dataKeluaran', [ExportControlller::class, 'exportKeluaran'])->name('keluaran.export');

// Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout')->middleware('auth');
