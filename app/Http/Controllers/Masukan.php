<?php

namespace App\Http\Controllers;

use App\Models\detailMasukan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Masukan extends Controller
{
    public function detagihan()
    {
        $danaMasuk = detailMasukan::join('dawis','dawis.id' , '=', 'iddawis')
        ->join('nasabah', 'nasabah.id', '=', 'idnasabah')
        ->select('detail_masukan.id','dawis.nama', 'nasabah.nama','tgl_masukan', 'nominal')
        ->get();
        $detailMasukan = detailMasukan::all();
        return view('backend.user.view_detailtagihan' , compact('danaMasuk', 'detailMasukan'));
    }
    public function pageMasuk($id)
    {
        $masuk = detailMasukan::Find($id);
        return view('backend.user.masukSaldo', compact('masuk'));
    }
    public function masuk(Request $request, $id)
    {
        $data = detailMasukan::find($id);
        $data->nominal += $request->nominal;
        $data->save();
        Alert::success('Sukses', 'tambah saldo Berhasil');
        return redirect()->route('detailtagihan.view')->with('info', 'tambah saldo berhasil');
    }
}
