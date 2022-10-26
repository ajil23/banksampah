<?php

namespace App\Http\Controllers;

use App\Models\dawis;
use App\Models\detailMasukan;
use App\Models\keluarSaldoDawis;
use App\Models\MasukanSaldoNasabah;
use App\Models\MasukansaldoPetugas;
use App\Models\nasabah;
use App\Models\petugas;
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
    public function detagihanNasabah()
    {
        $danaMasuk = MasukanSaldoNasabah::join('nasabah', 'nasabah.id', '=', 'idnasabah')
        ->select('masukan_saldo_nasabah.id', 'nama','tgl_masukan', 'nominal', 'struktur')
        ->get();
        $detailMasukan = detailMasukan::all();
        return view('backend.user.view_saldoNasabah' , compact('danaMasuk', 'detailMasukan'));
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
        return redirect()->route('tagihan.view')->with('info', 'tambah saldo berhasil');
    }
    public function masukSaldoNasabah()
    {
        $nasabah = nasabah::all();
        return view('backend.user.add_saldoNasabah', compact('nasabah'));
    }
    public function add_masukNasabah(Request $request)
    {
        $data = new MasukanSaldoNasabah();
        $data->tgl_masukan = $request->tgl_masukan;
        $data->struktur = $request->struktur;
        $data->idnasabah = $request->idnasabah;
        $data->nominal = $request->nominal;
        $data->save();
        Alert::success('Sukses', 'tambah saldo Berhasil');
        return redirect()->route('tambahSaldoNasabah.view')->with('info', 'tambah saldo berhasil');
    }
    public function detagihanPetugas()
    {
        $danaMasuk = MasukansaldoPetugas::join('petugas', 'petugas.id', '=', 'idpetugas')
        ->select('masukan_saldo_petugas.id', 'nama', 'tgl_masukan', 'nominal', 'struktur')
        ->get();
        return view('backend.user.view_saldoPetugas', compact('danaMasuk'));
    }
    public function masukSaldoPetugas()
    {
        $petugas = petugas::all();
        return view('backend.user.add_saldoPetugas', compact('petugas'));
    }
    public function add_masukPetugas(Request $request)
    {
        $data = new MasukansaldoPetugas();
        $data->tgl_masukan = $request->tgl_masukan;
        $data->struktur = $request->struktur;
        $data->idpetugas = $request->idpetugas;
        $data->nominal = $request->nominal;
        $data->save();
        Alert::success('Sukses', 'tambah saldo Berhasil');
        return redirect()->route('tambahSaldoPetugas.view')->with('info', 'tambah saldo berhasil');
    }
    public function detagihanDawis()
    {
        return view('backend.user.view_detailtagihan');
    }
    public function pageKeluarSaldoDawis()
    {
        $dawis = dawis::all();
        return view('backend.user.keluar_saldoDawis', compact('dawis'));
    }
    public function KeluarSaldoDawis(Request $request)
    {
        $data = new keluarSaldoDawis();
        $data->tgl_tagihan = $request->tgl_tagihan;
        $data->tgl_tempo = $request->tgl_tempo;
        $data->keterangan_keluar = $request->keterangan_keluar;
        $data->iddawis = $request->iddawis;
        $data->nominal = $request->nominal;
        $data->save();
        Alert::success('Sukses', 'tambah saldo Berhasil');
        return redirect()->route('kurangSaldoDawis.view')->with('info', 'tambah saldo berhasil');
    }

} 
