<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nasabah;
use App\Models\Penduduk;

class TabunganController extends Controller
{
    public function tabungan()
    {
        $tabungan = nasabah::all();
        return view('backend.user.view_tabungan', compact('tabungan'));
    } 
}
