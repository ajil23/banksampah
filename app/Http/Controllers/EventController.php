<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::all();
        return view('backend.user.view_event', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.add_event');
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
                'judul_event' => ['required'],
                'deskripsi' => ['required'],
                'tanggal_Mulai' => ['required'],
                'tanggal_akhir' => ['required'],
                'gambar' => ['required'],
            ],
            [
                'deskripsi.required'  => "deskripsi harus ditambahkan",
                'judul_event.required'        => "Judul event Harus diisi",
                'gambar.required'     => "gambar harus ditambahkan",
                'tanggal_akhir.required'     => "tanggal akhir harus diisi",
                'tanggal_Mulai.required'     => "tanggal mulai harus diisi",
            ]
        );
        $data = new Event();
        $data->judul_event = $request->judul_event;
        $data->deskripsi = $request->deskripsi;
        $data->tanggal_Mulai = $request->tanggal_Mulai;
        $data->tanggal_akhir = $request->tanggal_akhir;
        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move('fotoEvent/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $data->save();
        return redirect()->route('event.view')->with('success', 'Tambah Event berhasil');
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
        $data = Event::find($id);
        return view('backend.user.edit_event', compact('data'));
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
                'judul_event' => ['required'],
                'deskripsi' => ['required'],
                'tanggal_Mulai' => ['required'],
                'tanggal_akhir' => ['required'],
                'gambar' => ['required'],
            ],
            [
                'deskripsi.required'  => "deskripsi harus ditambahkan",
                'judul_event.required'        => "Judul event Harus diisi",
                'gambar.required'     => "gambar harus ditambahkan",
                'tanggal_akhir.required'     => "tanggal akhir harus diisi",
                'tanggal_Mulai.required'     => "tanggal mulai harus diisi",
            ]
        );

        $data = Event::find($id);

        if ($request->hasFile('gambar')) {
            if (File::exists('fotoEvent/' . $data->gambar)) {
                File::delete('fotoEvent/' . $data->gambar);
            }
            $request->file('gambar')->move('fotoEvent/', $request->file('gambar')->getClientOriginalName());
            $data->gambar = $request->file('gambar')->getClientOriginalName();
        }
        $data->judul_event = $request->judul_event;
        $data->deskripsi = $request->deskripsi;
        $data->tanggal_Mulai = $request->tanggal_Mulai;
        $data->tanggal_akhir = $request->tanggal_akhir;
        $data->update();
        return redirect()->route('event.view')->with('success', 'Update event berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataEvent = Event::find($id);
        $dataEvent->delete();
        return redirect()->route('event.view');
    }
}
