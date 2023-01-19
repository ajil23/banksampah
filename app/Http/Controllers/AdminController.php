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
        return view('backend.user.add_dawis', compact('data_nasabah'));
    }
    public function tambah_dawis(Request $request)
    {
        $validatedData = $request->validate(
            [
                'kode' => ['required', 'unique:dawis', 'numeric', 'min:3', 'max:3'],
                'nasabah_id' => ['required'],
                'jadwal' => ['required'],
            ],
            [
                'nasabah_id.required'  => "Nasabah harus dipilih",
                'kode.required'        => "Kode Harus diisi",
                'kode.unique'          => "Kode Sudah Terdaftar",
                'kode.numeric'          => "Kode Harus Berupa Angka",
                'kode.min'          => "Kode Harus 3 digit",
                'kode.max'          => "Kode Harus 3 digit",
                'jadwal.required'     => "Jadwal harus dipilih",
            ]
        );
        $data_dawis = new dawis();
        $data_dawis->kode = $request->input('kode');
        $data_dawis->nasabah_id = $request->nasabah_id;
        $data_dawis->jadwal = $request->jadwal;

        $data_dawis->save();



        return redirect()->route('dawis.view')->with('success', 'Tambah Dawis berhasil');
    }
    public function dawisDelete($id)
    {
        $deleteData = dawis::find($id);
        $deleteData->delete();
        return redirect()->route('dawis.view')->with('success', 'Delete user berhasil');
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
        if ($request->password != "") {
            $data->password = bcrypt($request->password);
        }
        $data->tmp_lahir = $request->tmp_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->save();
        Alert::success('Sukses', 'Dawis Berhasil Diupdate');
        return redirect()->route('dawis.view')->with('success', 'Edit user berhasil');
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
        $this->validate(
            $request,
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
        // return redirect()->route('nasabah.view')->with('success', 'Tambah user berhasil') ;
    }
    public function edit_nasabah($id)
    {
        $editData = nasabah::Find($id);
        $dawis = dawis::all();
        return view('backend.user.edit_nasabah', compact('editData', 'dawis'));
    }
    public function nasabahUpdate(Request $request, $id)
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
        return redirect()->route('nasabah.view')->with('success', 'Edit user berhasil');
    }
    public function nasabahDelete($id)
    {
        $deleteData = nasabah::find($id);
        $deleteData->delete();
        Alert::success('Sukses', 'Nasabah Berhasil Dihapus');
        return redirect()->route('nasabah.view')->with('success', 'Delete user berhasil');
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
        return redirect()->route('petugas.view')->with('success', 'Tambah user berhasil');
    }
    public function petugasDelete($id)
    {
        $deleteData = petugas::find($id);
        $deleteData->delete();
        return redirect()->route('petugas.view')->with('success', 'Delete user berhasil');
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
        return redirect()->route('petugas.view')->with('success', 'Edit user berhasil');
    }
    //endpetugas
    // public function tabungan()
    // {
    //     $tabungan['allDataTabungan']=nasabah::all();
    //     return view('backend.user.view_saldo', compact('tabungan'));
    // } 
    //sampah
    public function daftarsampah()
    {
        $data['allDataSampah'] = Sampah::all();
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
        $validatedData = $request->validate(
            [
                'namaSampah' => ['required', 'unique:sampah'],
                'satuan' => ['required'],
                'hargas' => ['required', 'numeric'],
            ],
            [
                'penduduk_id.required'  => "Nasabah tidak boleh kosong",
                'namaSampah.required'        => "Nama Sampah Harus diisi",
                'namaSampah.unique'          => "Nama Sampah Sudah Terdaftar",
                'satuan.required'     => "Password harus diisi",
                'hargas.required'         => "Harga harus ditambahkan",
                'hargas.numeric'         => "Harga harus berupa angka",
            ]
        );
        $data = new sampah();
        $data->namaSampah = $request->namaSampah;
        $data->satuan = $request->satuan;
        $data->harga_satuan = $request->hargas;
        $data->save();
        Alert::success('Sukses', 'Sampah Berhasil Ditambah');
        return redirect()->route('sampah.view')->with('success', 'Tambah Sampah berhasil');
    }
    public function sampahDelete($id)
    {
        $deleteData = sampah::find($id);
        $deleteData->delete();
        return redirect()->route('sampah.view')->with('success', 'Delete sampah berhasil');
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
        return redirect()->route('sampah.view')->with('success', 'Edit sampah berhasil');
    }

    //penduduk
    public function daftarPenduduk()
    {
        $datapenduduk['allDataPenduduk'] = Penduduk::all();
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
        $validatedData = $request->validate(
            [
                'nama' => ['required'],
                'tempatlahir' => ['required'],
                'alamat' => ['required'],
                'tanggallahir' => ['required'],
                'select' => ['required'],
                'telepon' => ['required', 'numeric'],
            ],
            [
                'nama.required'  => "Nama tidak boleh kosong",
                'tempatlahir.required'        => "Tempat Lahir Harus diisi",
                'alamat.required'          => "Alamat tidak boleh kosong",
                'tanggallahir.required'     => "Tanggal Lahir harus diisi",
                'select.required'         => "jenis kelamin harus dipilih",
                'telepon.required'         => "telepon harus ditambahkan",
                'telepon.numeric'         => "telepon harus berupa angka",
            ]
        );

        $datapenduduk = new penduduk();
        $datapenduduk->namaLengkap = $request->nama;
        $datapenduduk->tmp_lahir = $request->tempatlahir;
        $datapenduduk->tgl_lahir = $request->tanggallahir;
        $datapenduduk->alamat = $request->alamat;
        $datapenduduk->jenis_kelamin = $request->select;
        $datapenduduk->no_hp = $request->telepon;
        $datapenduduk->save();
        Alert::success('Sukses', 'Penduduk Berhasil Ditambah');
        return redirect()->route('penduduk.view')->with('success', 'Tambah Penduduk berhasil');
    }
    public function deletePenduduk($id)
    {
        $deletependuduk = penduduk::find($id);
        $deletependuduk->delete();
        return redirect()->route('penduduk.view')->with('success', 'Penduduk berhasil dihapus');
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
        $datapenduduk->jenis_kelamin = $request->select;
        $datapenduduk->no_hp = $request->telepon;
        $datapenduduk->save();
        Alert::success('Sukses', 'penduduk Berhasil Diupdate');
        return redirect()->route('penduduk.view')->with('success', 'Edit penduduk berhasil');
    }
}
