<?php

namespace App\Http\Controllers;

use App\Models\dawis;
use App\Models\nasabah;
use App\Models\Penduduk;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        return view('backend.user.view_nasabah', compact('dataNasabah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $q = DB::table('users')->select(DB::raw('MAX(RIGHT(id,6)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "000001";
        }

        $dataPenduduk = DB::table('penduduk')
            ->whereNotIn('id', function ($query) {
                $query->select('penduduk_id')->from('nasabah');
            })
            ->get();
        return view('backend.user.add_nasabah', compact('dataPenduduk', 'kd'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'email' => ['required', 'unique:users'],
                'password' => ['required'],
                'penduduk_id' => ['required'],
                'foto' => ['required'],
            ],
            [
                'penduduk_id.required'  => "Nasabah tidak boleh kosong",
                'email.required'        => "Username Harus diisi",
                'email.unique'          => "Username Sudah Terdaftar",
                'password.required'     => "Password harus diisi",
                'foto.required'         => "foto harus ditambahkan",
            ]
        );
        $user = new User();
        $user->id           = $request->user_id;
        $user->name         = $request->input('email');
        $user->email        = $request->input('email');
        $user->password     = bcrypt($request->password);
        $user->role         = "nasabah";
        $user->save();

        $dataNasabah = new nasabah();
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoNasabah/', $request->file('foto')->getClientOriginalName());
            $dataNasabah->foto = $request->file('foto')->getClientOriginalName();
        }

        $dataNasabah->penduduk_id   = $request->penduduk_id;
        $dataNasabah->user_id       = $request->user_id;
        $dataNasabah->tgl_daftar    = Carbon::now();
        $dataNasabah->save();
        return redirect()->route('nasabah.view')->with('success', 'Tambah nasabah berhasil');
    }


    public function editUser($id)
    {
        $dataUser = User::find($id);
        return view('backend.user.edit_paswordNasabah', compact('dataUser'));
    }


    public function edit($id)
    {
        $dataPenduduk = Penduduk::all();
        $dataNasabah = nasabah::find($id);
        $dataDawis = dawis::all();
        return view('backend.user.edit_nasabah', compact('dataPenduduk', 'dataNasabah', 'dataDawis'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'penduduk_id'           => 'required',
            ],
            [
                'penduduk_id.required'  => "Kode Dawis tidak boleh kosong",
            ]
        );

        $dataNasabah = nasabah::find($id);

        if ($request->hasFile('foto')) {
            if (File::exists('fotoNasabah/' . $dataNasabah->foto)) {
                File::delete('fotoNasabah/' . $dataNasabah->foto);
            }

            $request->file('foto')->move('fotoNasabah/', $request->file('foto')->getClientOriginalName());
            $dataNasabah->foto = $request->file('foto')->getClientOriginalName();
        }
        $dataNasabah->penduduk_id   = $request->penduduk_id;
        $dataNasabah->dawis_id      = $request->dawis_id;
        $dataNasabah->update();
        return redirect()->route('nasabah.view')->with('success', 'Update nasabah berhasil');
    }
    public function updatePassword(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'username'              => 'required',
                'password'              => 'required',
            ],
            [
                'username.required'     => "Username Harus diisi",
                'password.required'     => "Password harus diisi",
            ]
        );

        $dataUser = User::find($id);
        $dataUser->email      = $request->username;
        $dataUser->password      = bcrypt($request->password);
        $dataUser->update();
        return redirect()->route('nasabah.view')->with('success', 'Update password berhasil');
    }

    public function destroy($id)
    {
        $dataBarang = user::find($id);
        $dataBarang->delete();
        return redirect()->route('nasabah.view')->with('success', 'Hapus nasabah berhasil');
    }
}
