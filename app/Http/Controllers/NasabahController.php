<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use App\Models\Penduduk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataNasabah = nasabah::all();
        return view('backend.user.view_nasabah',compact('dataNasabah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataPenduduk = Penduduk::all();
        return view('backend.user.add_nasabah',compact('dataPenduduk'));
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'penduduk_id'           => 'required',
                'username'              => 'required',
                'password'              => 'required',
            ],
            [
                'penduduk_id.required'  => "Kode Dawis tidak boleh kosong",
                'username.required'     => "Username Harus diisi",
                'password.required'     => "Password harus diisi",
            ]
        );

        $dataNasabah = new nasabah();

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoNasabah/', $request->file('foto')->getClientOriginalName());
            $dataNasabah->foto = $request->file('foto')->getClientOriginalName();
        }

        $dataNasabah->penduduk_id   = $request->penduduk_id;
        $dataNasabah->username      = $request->input('username');
        $dataNasabah->password      = bcrypt($request->password);
        $dataNasabah->tgl_daftar    = Carbon::now();
        $dataNasabah->save();
        Alert::success('Sukses', 'Nasabah Berhasil Ditambah');
        return redirect()->route('nasabah.view')->with('info', 'Tambah nasabah berhasil') ;
    
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $dataPenduduk = Penduduk::all();
        $dataNasabah = nasabah::find($id);
        return view('backend.user.edit_nasabah', compact('dataPenduduk', 'dataNasabah'));
    }

 
    public function update(Request $request, $id)
    {
        $this->validate($request,
            [
                'penduduk_id'           => 'required',
                'username'              => 'required',
                'password'              => 'required',
            ],
            [
                'penduduk_id.required'  => "Kode Dawis tidak boleh kosong",
                'username.required'     => "Username Harus diisi",
                'password.required'     => "Password harus diisi",
            ]
        );

        $dataNasabah = nasabah::find($id);

        if ($request->hasFile('foto')) {
            if (File::exists('fotoNasabah/'.$dataNasabah->foto)) {
                File::delete('fotoNasabah/'.$dataNasabah->foto);
            }

            $request->file('foto')->move('fotoNasabah/', $request->file('foto')->getClientOriginalName());
            $dataNasabah->foto = $request->file('foto')->getClientOriginalName();
        }

        $dataNasabah->penduduk_id   = $request->penduduk_id;
        $dataNasabah->username      = $request->username;
        $dataNasabah->password      = bcrypt($request->password);
        $dataNasabah->update();
        Alert::success('Sukses', 'Nasabah Berhasil Diupdate');
        return redirect()->route('nasabah.view')->with('info', 'Update nasabah berhasil') ;
    }

    public function destroy($id)
    {
        $dataBarang = nasabah::find($id);
        $dataBarang->delete();

        Alert::success('Sukses', 'Nasabah Berhasil Dihapus');
        return redirect()->route('nasabah.view')->with('info', 'Hapus nasabah berhasil');
    }
}
