<?php

namespace App\Http\Controllers;
use App\Models\dawis;
use App\Models\detailMasukan;
use App\Models\nasabah;
use App\Models\petugas;
use App\Models\sampah;
use App\Models\struktur;
use App\Models\tagihan;
use App\Models\Penduduk;
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
        return redirect('/');
    }


    //dawis
    public function dawis()
    {
        $data_dawis = dawis::all();
        return view('backend.user.view_dawis', compact('data_dawis'));
    }
    public function add_dawis()
    {
        $data_nasabah = nasabah::doesntHave('dawis')->get();

        return view('backend.user.add_dawis',compact('data_nasabah'));
    }
    public function tambah_dawis(Request $request)
    {
        // $this->validate($request,
        //     [
        //         'kode'                  => 'required',
        //         'nasabah_id'            => 'required',
        //     ],
        //     [
        //         'kode.required'         => "Kode Dawis tidak boleh kosong",
        //         'nasabah_id.required'   => "Pilih Nasabah",
        //     ]
        // );
        $data_dawis = new dawis();
        $data_dawis->kode = $request->input('kode');
        $data_dawis->nasabah_id = $request->nasabah_id;

        $data_dawis->save();
        Alert::success('Sukses', 'Dawis Berhasil Ditambah');
        return redirect()->route('dawis.view')->with('info', 'Tambah Dawis berhasil');
    }
    public function dawisDelete($id)
    {
        $deleteData = dawis::find($id);
        $deleteData->delete();
        return redirect()->route('dawis.view')->with('info', 'Delete user berhasil');
    }
    public function edit_dawis($id)
    {
        $editDawis = dawis::Find($id);
        return view('backend.user.edit_dawis', compact('editDawis'));
    }
    public function dawisUpdate(Request $request, $id)
    {
        $data = dawis::find($id);
        if ($data->foto = $request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newbaru = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('fotoDawis', $newbaru);
        }
        $data['foto'] = $newbaru;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        // $data->foto = $request->foto;
        if($request->password!=""){
            $data->password=bcrypt($request->password);
        }
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        Alert::success('Sukses', 'Dawis Berhasil Diupdate');
        return redirect()->route('dawis.view')->with('info', 'Edit user berhasil');
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
        return view('backend.user.add_nasabah');
    }
    public function tambah_nasabah(Request $request)
    {
        $this->validate($request,
            [
                'penduduk'              => 'required',
                'username'
            ],
            [
                'kode.required'         => "Kode Dawis tidak boleh kosong",
                'nasabah_id.required'   => "Pilih Nasabah",
            ]
        );

        $dataNasabah = new nasabah();

        // $data = new nasabah();
        // if ($data->foto = $request->file('foto')) {
        //     $extension = $request->file('foto')->getClientOriginalExtension();
        //     $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
        //     $request->file('foto')->storeAs('fotoNasabah', $newName);
        // }
        // $data['foto'] = $newName;
        // $data->nama = $request->nama;
        // $data->no_hp = $request->no_hp;
        // // $data->foto = $request->foto;
        // $data->tgl_join = $request->tgl_join;
        // $data->password = bcrypt($request->password);
        // $data->tgl_lahir = $request->tgl_lahir;
        // $data->save();
        // Alert::success('Sukses', 'Nasabah Berhasil Ditambah');
        // return redirect()->route('nasabah.view')->with('info', 'Tambah user berhasil') ;
    }
    public function edit_nasabah($id)
    {
        $editData = nasabah::Find($id);
        $dawis = dawis::all();
        return view('backend.user.edit_nasabah', compact('editData', 'dawis'));
    }
    public function nasabahUpdate(Request $request,$id)
    {
        $data = nasabah::find($id);
        if ($data->foto = $request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('fotoNasabah', $newName);
        }
        $data['foto'] = $newName;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        // $data->foto = $request->foto;
        if ($request->password != "") {
            $data->password = bcrypt($request->password);
        }
        $data->tgl_join = $request->tgl_join;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->iddawis = $request->iddawis;
        $data->save();
        Alert::success('Sukses', 'Nasabah Berhasil Diupdate');
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
    //petugas
    public function petugas()
    {
        $data = [
            'petugas' => petugas::all()
        ];
        return view('backend.user.view_petugas', $data);
    }
    public function add_petugas()
    {
        $petugas = petugas::all();
        return view('backend.user.add_petugas', compact('petugas'));
    }
    public function tambah_petugas(Request $request)
    {
        $data = new petugas();
        if ($data->foto = $request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('fotoPetugas', $newName);
        }
        $data['foto'] = $newName;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        // $data->foto = $request->foto;
        $data->tmp_lahir = $request->tmp_lahir;
        $data->password = bcrypt($request->password);
        $data->tgl_lahir = $request->tgl_lahir;
        $data->tugas = $request->tugas;
        $data->save();
        Alert::success('Sukses', 'Petugas Berhasil Ditambah');
        return redirect()->route('petugas.view')->with('info', 'Tambah user berhasil');
    }
    public function petugasDelete($id)
    {
        $deleteData = petugas::find($id);
        $deleteData->delete();
        return redirect()->route('petugas.view')->with('info', 'Delete user berhasil');
    }
    public function edit_petugas($id)
    {
        $petugasData = petugas::Find($id);
        return view('backend.user.edit_petugas', compact('petugasData'));

    }
    public function petugasUpdate(Request $request, $id)
    {
        $data = petugas::find($id);
        if ($data->foto = $request->file('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            $newName = $request->nama . '-' . now()->timestamp . '.' . $extension;
            $request->file('foto')->storeAs('fotoPetugas', $newName);
        }
        $data['foto'] = $newName;
        $data->nama = $request->nama;
        $data->no_hp = $request->no_hp;
        // $data->foto = $request->foto;
        if ($request->password != "") {
            $data->password = bcrypt($request->password);
        }
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->tugas = $request->tugas;
        $data->save();
        Alert::success('Sukses', 'Petugas Berhasil Diupdate');
        return redirect()->route('petugas.view')->with('info', 'Edit user berhasil');
    }
    //endpetugas
    public function tabungan()
    {
        return view('backend.user.view_tabungan');
    } 
    //sampah
    public function daftarsampah()
    {
        $data['allDataSampah']=Sampah::all();
        return view('backend.user.view_sampah', $data);
    } 

    public function sampah()
    {
        $data = [
            'sampah' => sampah::all()
        ];
        return view('backend.user.view_sampah', $data);
    }
    public function add_sampah()
    {
        return view('backend.user.add_sampah');
    }
    public function tambah_sampah(Request $request)
    {
        $data = new sampah();
        $data->namaSampah = $request->namaSampah;
        $data->satuan = $request->satuan;
        $data->harga_satuan = $request->hargas;
        $data->save();
        Alert::success('Sukses', 'Sampah Berhasil Ditambah');
        return redirect()->route('sampah.view')->with('info', 'Tambah Sampah berhasil') ;
    }
    public function sampahDelete($id)
    {
        $deleteData = sampah::find($id);
        $deleteData->delete();
        return redirect()->route('sampah.view')->with('info', 'Delete sampah berhasil');
    }
    public function sampahEdit($id)
    {
        $editSampah = sampah::find($id);
        return view('backend.user.edit_sampah', compact('editSampah'));
    }
    public function sampahUpdate(Request $request, $id)
    {
        $data = sampah::find($id);
        $data->nama = $request->nama;
        $data->satuan = $request->satuan;
        $data->harga_satuan = $request->hargas;
        $data->save();
        Alert::success('Sukses', 'Sampah Berhasil Diupdate');
        return redirect()->route('sampah.view')->with('info', 'Edit sampah berhasil');
    }

    //penduduk
    public function daftarPenduduk()
    {
        $datapenduduk['allDataPenduduk']=Penduduk::all();
        return view('backend.user.view_penduduk', $datapenduduk);
    } 

    public function penduduk()
    {
        $datapenduduk = [
            'penduduk' => penduduk::all()
        ];
        return view('backend.user.view_penduduk', $datapenduduk);
    }
    public function tambahPenduduk()
    {
        return view('backend.user.add_penduduk');
    }
    public function pendudukBaru(Request $request)
    {
        $datapenduduk = new penduduk();
        $datapenduduk->namaLengkap = $request->nama;
        $datapenduduk->tmp_lahir = $request->tempatlahir;
        $datapenduduk->tgl_lahir = $request->tanggallahir;
        $datapenduduk->alamat = $request->alamat;
        $datapenduduk->jenis_kelamin = $request->gender;
        $datapenduduk->no_hp = $request->telepon;
        $datapenduduk->save();
        Alert::success('Sukses', 'Penduduk Berhasil Ditambah');
        return redirect()->route('penduduk.view')->with('info', 'Tambah Penduduk berhasil') ;
    }
    public function deletePenduduk($id)
    {
        $deletependuduk = penduduk::find($id);
        $deletependuduk->delete();
        return redirect()->route('penduduk.view')->with('info', 'Penduduk berhasil dihapus');
    }
    public function editPenduduk($id)
    {
        $editPenduduk = penduduk::find($id);
        return view('backend.user.edit_Penduduk', compact('editPenduduk'));
    }
    public function updatePenduduk(Request $request, $id)
    {
        $datapenduduk = penduduk::find($id);
        $datapenduduk->namaLengkap = $request->nama;
        $datapenduduk->tmp_lahir = $request->tempatlahir;
        $datapenduduk->tgl_lahir = $request->tanggallahir;
        $datapenduduk->alamat = $request->alamat;
        $datapenduduk->jenis_kelamin = $request->gender;
        $datapenduduk->no_hp = $request->telepon;
        $datapenduduk->save();
        Alert::success('Sukses', 'penduduk Berhasil Diupdate');
        return redirect()->route('penduduk.view')->with('info', 'Edit penduduk berhasil');
    }
}
