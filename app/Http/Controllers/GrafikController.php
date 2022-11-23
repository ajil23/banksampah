<?php

namespace App\Http\Controllers;

use App\Models\detailMasukan;
use App\Models\nasabah;
use App\Models\Penduduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\NotIn;

class GrafikController extends Controller
{
    public function grafik()
    {
        $nasabah = (new nasabah())->getTable();
        $penduduk = (new penduduk())->getTable();

        $total_harga = detailMasukan::select(DB::raw("CAST(SUM(sub_harga) as int) as total_harga"))
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('total_harga');

        $bulan = detailMasukan::select(DB::raw("MONTHNAME(created_at) as bulan"))
        ->where(DB::raw('YEAR(created_at)'), '=', '2022' )
        ->GroupBy(DB::raw("Month(created_at)"))
        ->pluck('bulan');
        dd($bulan);
        $jumlahPenduduk = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
        ->whereNotIn('id', function($query){
            $query->select('penduduk_id')->from('nasabah');
        })
        ->count();
        return view('test', compact('total_harga')); 
    }
}
