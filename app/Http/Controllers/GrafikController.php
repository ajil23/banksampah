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

        $jumlahPenduduk = Penduduk::select(DB::raw("COUNT(*) as jumlah"))
        ->whereNotIn('id', function($query){
            $query->select('penduduk_id')->from('nasabah');
        })
        ->count();
        dd($jumlahPenduduk);
        return view('test', compact('total_harga'));
    }
}
