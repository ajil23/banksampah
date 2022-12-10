<?php

namespace App\Http\Controllers\API\nasabah;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user();
        return response()->json([
            'id'            => $data->id,
            'role'          => $data->role,
            'username'      => $data->email,
            'nama'          => $data->nasabah->penduduk->namaLengkap,
            'saldo'         => $data->nasabah->saldo,
            'tgl_daftar'    => $data->nasabah->tgl_daftar,
            'tempat_lahir'  => $data->nasabah->penduduk->tmp_lahir,
            'tanggal_lahir' => $data->nasabah->penduduk->tgl_lahir,
            'alamat'        => $data->nasabah->penduduk->alamat,
            'kode'          => $data->nasabah->dawis->kode,
            'alamat_dawis'  => $data->nasabah->dawis->nasabah->penduduk->alamat,
        ], 200);
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email'  => 'required',
            'password'  => 'required'
        ]);

        $login = request(['email', 'password']);

        if (!Auth::attempt($login)) {
            return response()->json([
                'error' => 'Login gagal. Harap periksa user',
                'valdasi' => false
            ], 401);
        }

        $user = $request->user();

        return response()->json([
            'token'         => $user->createToken("API TOKEN")->plainTextToken,
            'role'          => $user->role,
            'validasi'      => true,
            'nama'          => $user->nasabah->penduduk->namaLengkap,
            'dawis'         => $user->nasabah->kelompok->dawis->nasabah->penduduk->namaLengkap
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function logoutNasabah(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
    }
}
