<?php

namespace App\Http\Controllers;

use App\Models\detailMasukan;
use App\Models\nasabah;
use App\Models\Penduduk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\NotIn;

class GrafikController extends Controller
{
    public function grafik()
    {
        $nasabah = (new nasabah())->getTable();
        $penduduk = (new penduduk())->getTable();



        $total_harga = detailMasukan::select(DB::raw("SUM(sub_harga) as total_harga"))
            ->where(DB::raw('YEAR(created_at)'), '=', '2022')
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('total_harga');
 

        $bulan = detailMasukan::select(DB::raw("MONTHNAME(created_at) as bulan"))
            ->where(DB::raw('YEAR(created_at)'), '=', '2022')
            ->GroupBy(DB::raw("Month(created_at)"))
            ->pluck('bulan');
       

        $jumlahPenduduk = DB::table('Penduduk')
            ->whereNotIn('id', function ($query) {
                $query->select('penduduk_id')->from('nasabah');
            })
            ->get();


        $jumlahpetugas = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
            ->whereIn('id', function ($query) {
                $query->select('penduduk_id')->from('petugas');
            })->count();
        

        $jumlahTransaksi = DB::table('transaksi')->count();
        $jumlahSaldo = nasabah::sum('saldo');
        dd($jumlahSaldo);
        $jumlahDawis = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
            ->whereIn('id', function ($query) {
                $query->select('penduduk_id')->from('petugas');
            })->count();
        return view('test', compact('total_harga'));
    }
}
