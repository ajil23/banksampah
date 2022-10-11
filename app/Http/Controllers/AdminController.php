<?php

namespace App\Http\Controllers;

use App\Models\nasabah;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Catch_;
use Throwable;

class AdminController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function tagihan()
    {
        return view('backend.user.view_tagihan');
    }

    public function detagihan()
    {
        return view('backend.user.view_detailtagihan');
    }
    public function dawis()
    {
        return view('backend.user.view_dawis');
    }
    //nasabah
    public function nasabah()
    {
        $data = [
            'nasabah' => nasabah::all()
        ];
        return view('backend.user.view_nasabah', $data);
    }
    public function add_nasabah()
    {
        return view('backend.user.add_nasabah');
    }
    public function tambah_nasabah(Request $request)
    {
        $data = new nasabah();
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->foto = $request->foto;
        $data->tgl_join = $request->tgl_join;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->iddawis = $request->iddawis;
        $data->save();
        return redirect()->route('nasabah.view')->with('info', 'Tambah user berhasil');
    }
    public function edit_nasabah($id)
    {
        $editData = nasabah::Find($id);
        return view('backend.user.edit_nasabah', compact('editData'));
    }
    public function nasabahUpdate(Request $request,$id)
    {
        $data = nasabah::find($id);
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->foto = $request->foto;
        $data->tgl_join = $request->tgl_join;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->iddawis = $request->iddawis;
        $data->save();
        return redirect()->route('nasabah.view')->with('info', 'Edit user berhasil');
    }
    public function nasabahDelete($id)
    {
        $deleteData = nasabah::find($id);
        $deleteData->delete();

        return redirect()->route('nasabah.view')->with('info', 'Delete user berhasil');
    }
    //endnasabah
    public function petugas()
    {
        return view('backend.user.view_petugas');
    } 
    public function tabungan()
    {
        return view('backend.user.view_tabungan');
    } 

}
