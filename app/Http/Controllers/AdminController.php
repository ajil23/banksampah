<?php

namespace App\Http\Controllers;
use App\Models\dawis;
use App\Models\nasabah;
use Dflydev\DotAccessData\Data;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\Catch_;
use Throwable;
use RealRashid\SweetAlert\Facades\Alert;

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
    //dawis
    public function dawis()
    {
        $data = [
            'dawis' => dawis::all()
        ];
        return view('backend.user.view_dawis', $data);
    }
    public function add_dawis()
    {
        return view('backend.user.add_dawis');
    }
    public function tambah_dawis(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'no_hp' => 'required|numeric',
            'foto' => 'required',
            'tmp_lahir' => 'required',
            'tgl_lahir' => 'required',
        ],
        
    );

        $data = new dawis();
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        $data->foto = $request->foto;
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        Alert::success('Sukses', 'Dawis Berhasil Ditambah');
        return redirect()->route('dawis.view')->with('info', 'Tambah user berhasil');
    }
    public function dawisDelete($id)
    {


        $deleteData = dawis::find($id);
        Alert::success('Sukses', 'Dawis Berhasil Dihapus');
        $deleteData->delete();
        return redirect()->route('dawis.view')->with('info', 'Delete user berhasil');
    }
    //enddawis
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
        $dawis = dawis::all();
        return view('backend.user.add_nasabah', compact('dawis'));
    }
    public function tambah_nasabah(Request $request)
    {
        $data = new nasabah();
        if ($data->foto = $request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('fotoNasabah', $newName);
        }
        $data['foto'] = $newName;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        // $data->foto = $request->foto;
        $data->tgl_join = $request->tgl_join;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->iddawis = $request->iddawis;
        $data->save();
        Alert::success('Sukses', 'Nasabah Berhasil Ditambah');
        return redirect()->route('nasabah.view')->with('info', 'Tambah user berhasil') ;
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
        Alert::success('Sukses', 'Nasabah Berhasil Dihapus');
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
