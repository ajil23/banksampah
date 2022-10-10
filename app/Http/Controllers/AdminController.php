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
    public function petugas()
    {
        return view('backend.user.view_petugas');
    } 
    public function tabungan()
    {
        return view('backend.user.view_tabungan');
    } 

}
