<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\nasabah;
use App\Models\Penduduk;

class DashboardController extends Controller
{
    public function index(){

        $penduduks = Penduduk::count();
        $nasabahs = nasabah::count();
        return view('admin.index', compact('penduduks','nasabahs'));
    }
}
