<?php

namespace App\Http\Controllers;

use App\Models\dawis;
use App\Models\detailMasukan;
use App\Models\keluarSaldoDawis;
use App\Models\MasukanSaldoNasabah;
use App\Models\MasukansaldoPetugas;
use App\Models\nasabah;
use App\Models\petugas;
use App\Models\Riwayat;
use App\Models\sampah;
use App\Models\struktur;
use App\Models\Transaksi;
use App\Models\transaksiDawis;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class Masukan extends Controller
{

    public function transaksi()
    {
        $riwayat = Riwayat::with('nasabah.penduduk')->get();
        return view('backend.user.view_transaksi', compact('riwayat'));
    }

    public function masukSaldo()
    {
        $nasabah = nasabah::all();
        $petugas = petugas::all();
        $dawis = dawis::all();
        $sampah = sampah::all();
        $q = DB::table('riwayat')->select(DB::raw('MAX(RIGHT(kode_id,6)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }
        return view('backend.user.add_masukSaldo', compact('nasabah', 'sampah','kd','dawis','petugas'));
    }


    public function masukSaldoNasabah()
    {
        $nasabah = nasabah::all();
        
        return view('backend.user.add_saldoNasabah', compact('nasabah','kd'));
    }


    public function pengambilanSampah()
    {
        $transaksi = Transaksi::with('nasabah.penduduk')->get();
        return view('backend.user.view_detailtagihan', compact('transaksi'));
    }
    public function pageKeluarSaldo()
    {
        $nasabah = nasabah::all();
        return view('backend.user.keluar_saldo', compact('nasabah'));
    }
    public function kurangSaldo(Request $request)
    {
        $data = new Transaksi();
        $data->nasabah_id = $request->nasabah_id;
        $data->nominal = $request->nominal;
        $data->keterangan_pembelian = $request->keterangan_pembelian;

        $saldo = nasabah::find($request->nasabah_id);
        $saldo->saldo -= $request->nominal;
        $saldo->save();
        $data->save();
        Alert::success('Sukses', 'Keluar saldo Berhasil');
        return redirect()->route('kurangSaldo.view');
    }
    public function ajax(Request $request)
    {
        $namaSampah = $request->namaSampah;
        $ajax_sampah = sampah::where('id', $namaSampah)->get();
        return view('backend.ajax.ajax_pembayaran', compact('ajax_sampah'));
    }
    public function ajax2(Request $request)
    {
        $namaSampah = $request->namaSampah;
        $ajax_sampah = sampah::where('id', $namaSampah)->get();
        return view('backend.user.ajax_pembayaran', compact('ajax_sampah'));
    }
    public function detailTransaksi(Request $request)
    {
       
        $riwayat = new Riwayat();
        $riwayat->kode_id = $request->kode_id;
        $riwayat->nasabah_id = $request->idnasabah;
        $riwayat->keterangan_masuk = 'Pemasukan Dari Sampah';
        $riwayat->nominal = $request->total;
        $riwayat->save();

        foreach ($request->idsampah as $key => $idsampah) {
            $data = new detailMasukan;
            $data->idsampah = $idsampah;
            $data->idnasabah = $request->idnasabah;
            $data->idriwayat = $request->kode_id;
            $data->berat = $request->berat[$key];
            $data->harga_satuan = $request->harga_satuan[$key];
            $data->sub_harga = $request->sub_harga[$key];
            $data->save();
        }
        $nasabah = nasabah::find($request->idnasabah);
        $nasabah->saldo += $request->total;
        $nasabah->save();
        Alert::success('Sukses', 'Masukan Data Berhasil');
        return redirect()->route('tagihan.view');
    }
    public function detail($kode_id)
    {
        $riwayat = Riwayat::find($kode_id);
        $data = Riwayat::with(['detail.sampah'])->findOrFail($kode_id);
        return view('backend.user.view_detail', compact('data','riwayat'));
    }
}
