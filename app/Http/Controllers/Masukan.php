<?php

namespace App\Http\Controllers;

use App\Models\dawis;
use App\Models\detailMasukan;
use App\Models\struktur;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Masukan extends Controller
{
    public function masukSaldo(){
        $dawis = dawis::all();
        return view('backend.user.add_masukDawis', compact( 'dawis'));
    }
    public function keluarSaldo()
    {
        $dawis = dawis::all();
        return view('backend.user.add_keluar', compact( 'dawis'));
    }
    public function detagihan()
    {
        $danaMasuk = detailMasukan::join('dawis', 'dawis.id', '=', 'iddawis')
        ->select('detail_masukan.id', 'dawis.nama','tgl_masukan', 'nominal', 'struktur')
        ->get();
        $detailMasukan = detailMasukan::all();
        return view('backend.user.view_detailtagihan' , compact('danaMasuk', 'detailMasukan'));
    }
    public function pageMasuk($id)
    {
        $masuk = detailMasukan::Find($id);
        return view('backend.user.masukSaldo', compact('masuk'));
    }
    public function add_masuk(Request $request)
    {
        $data = new detailMasukan();
        $data->tgl_masukan = $request->tgl_masukan;
        $data->struktur = $request->struktur;
        $data->iddawis = $request->iddawis;
        $data->nominal = $request->nominal;
        $data->save();
        Alert::success('Sukses', 'tambah saldo Berhasil');
        return redirect()->route('detailtagihan.view')->with('info', 'tambah saldo berhasil');
    }
}
