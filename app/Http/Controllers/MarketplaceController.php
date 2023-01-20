<?php

namespace App\Http\Controllers;

use App\Models\MarketPlace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MarketplaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MarketPlace::all();
        return view('backend.user.view_marketplace',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.add_marketplace');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'judul' => ['required'],
                'harga' => ['required','numeric'],
                'no_wa' => ['required', 'numeric', 'min:12', 'regex:/62[0-9]{8,11}$/'],
                'gambar' => ['required'],
            ],
            [
                'harga.required'  => "harga harus ditambahkan",
                'judul.required'        => "Judul Barang Harus diisi",
                'harga.numeric'          => "harga Harus Berupa Angka",
                'gambar.required'     => "gambar harus ditambahkan",
                'no_wa.required'     => "nomor wa harus diisi",
                'no_wa.numeric'          => "nomor wa Harus Berupa Angka",
            ]
        );
        $data = new MarketPlace();
        $data->judul = $request->judul;
        $data->harga = $request->harga;
        $data->no_wa = $request->no_wa;
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('fotoBarang/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $data->save();
        return redirect()->route('marketplace.view')->with('success', 'Tambah Barang berhasil');
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
        $data = MarketPlace::find($id);
        return view('backend.user.edit_marketplace', compact('data'));
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
        $validatedData = $request->validate(
            [
                'judul' => ['required'],
                'harga' => ['required', 'numeric'],
                'no_wa' => ['required', 'numeric', 'min:12', 'regex:/62[0-9]{8,11}$/'],
            ],
            [
                'harga.required'  => "harga harus ditambahkan",
                'judul.required'        => "Judul Barang Harus diisi",
                'harga.numeric'          => "harga Harus Berupa Angka",
                'no_wa.required'     => "nomor wa harus diisi",
                'no_wa.numeric'          => "nomor wa Harus Berupa Angka",
            ]
        );

        $data = MarketPlace::find($id);

        if ($request->hasFile('gambar')) {
            if (File::exists('fotoBarang/' . $data->gambar)) {
                File::delete('fotoBarang/' . $data->gambar);
            }
            $request->file('gambar')->move('fotoBarang/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $data->judul = $request->judul;
        $data->harga = $request->harga;
        $data->no_wa = $request->no_wa;
        $data->update();
        return redirect()->route('marketplace.view')->with('success', 'Update barang berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBarang = MarketPlace::find($id);
        $dataBarang->delete();
        return redirect()->route('marketplace.view');
    }
}
