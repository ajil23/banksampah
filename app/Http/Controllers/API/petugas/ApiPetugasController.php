<?php

namespace App\Http\Controllers\API\petugas;

use App\Http\Controllers\Controller;
use App\Models\detailMasukan;
use App\Models\nasabah;
use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = Auth::user();
        return response()->json([
            'id'            => $petugas->id,
            'role'          => $petugas->role,
            'username'      => $petugas->email,
            'nama'          => $petugas->petugas->penduduk->namaLengkap,
            'tgl_daftar'    => $petugas->petugas->tgl_daftar,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $riwayat = new Riwayat();
        $riwayat->kode_id = $request->kode_id;
        $riwayat->nasabah_id = $request->idnasabah;
        $riwayat->petugas_id = $request->idpetugas;
        $riwayat->dawis_id = $request->iddawis;
        $riwayat->keterangan_masuk = 'Pemasukan Dari Sampah';
        $riwayat->nominal = $request->total;
        $riwayat->save();

        foreach ($request->list_sampah as $key => $valueas) {
            $sampah = array(
                'idsampah'     => $valueas['idsampah'],
                'idnasabah'    => $riwayat->nasabah_id,
                'idriwayat'    => $request->kode_id,
                'berat'        => $valueas['berat'],
                'harga_satuan' => $valueas['harga_satuan'],
                'sub_harga'    => $valueas['sub_harga']
            );
            $sampah = detailMasukan::create($sampah);
        }

        $nasabah = nasabah::find($request->idnasabah);
        $nasabah->saldo += $request->total;
        $nasabah->save();

        return response()->json([
            'messege'         => 'success',
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function logoutPetugas(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
