<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\nasabah;
use App\Models\Penduduk;
use App\Models\petugas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataPetugas = petugas::all();
        return view('backend.user.view_petugas', compact('dataPetugas'));
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
        $dataPenduduk = DB::table('Penduduk')
            ->whereNotIn('id', function ($query) {
                $query->select('penduduk_id')->from('petugas');
            })
            ->get();;
        return view('backend.user.add_petugas', compact('dataPenduduk','kd'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'penduduk_id'           => 'required',
                'username'              => 'required',
                'password'              => 'required',
            ],
            [
                'penduduk_id.required'  => "Kode Penduuk tidak boleh kosong",
                'username.required'     => "Username Harus diisi",
                'password.required'     => "Password harus diisi",
            ]
        );
        $user = new User();
        $user->id           = $request->user_id;
        $user->name         = $request->input('username');
        $user->email        = $request->input('username');
        $user->password     = bcrypt($request->password);
        $user->role         = "petugas";
        $user->save();

        $dataPetugas = new petugas();

        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotoPetugas/', $request->file('foto')->getClientOriginalName());
            $dataPetugas->foto = $request->file('foto')->getClientOriginalName();
        }

        $dataPetugas->penduduk_id   = $request->penduduk_id;
        $dataPetugas->user_id       = $request->user_id;
        $dataPetugas->role          = $request->role;
        $dataPetugas->save();
        Alert::success('Sukses', 'Petugas Berhasil Ditambah');
        return redirect()->route('petugas.view')->with('info', 'Tambah Petugas berhasil');
    }


    public function editUser($id)
    {
        $dataUser = User::find($id);
        return view('backend.user.edit_paswordNasabah', compact('dataUser'));
    }


    public function edit($id)
    {
        $dataPenduduk = Penduduk::all();
        $dataPetugas = petugas::find($id);
        return view('backend.user.edit_Petugas', compact('dataPenduduk', 'dataPetugas'));
    }


    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
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

        $dataPetugas = petugas::find($id);

        if ($request->hasFile('foto')) {
            if (File::exists('fotoPetugas/' . $dataPetugas->foto)) {
                File::delete('fotoPetugas/' . $dataPetugas->foto);
            }

            $request->file('foto')->move('fotoPetugas/', $request->file('foto')->getClientOriginalName());
            $dataPetugas->foto = $request->file('foto')->getClientOriginalName();
        }

        $dataPetugas->penduduk_id   = $request->penduduk_id;
        $dataPetugas->update();
        Alert::success('Sukses', 'Petugas Berhasil Diupdate');
        return redirect()->route('petugas.view')->with('info', 'Update Petugas berhasil');
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

        return redirect()->route('petugas.view')->with('success', 'Update password berhasil');
    }

    public function destroy($id)
    {
        $dataBarang = user::find($id);
        $dataBarang->delete();
        return redirect()->route('petugas.view')->with('success', 'Hapus Petugas berhasil');
    }
}
