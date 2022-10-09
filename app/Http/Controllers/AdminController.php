<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    public function logout(Request $request){
       Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function tagihan(){
        return view('backend.user.view_tagihan');
    }

    public function detagihan(){
        return view('backend.user.view_detailtagihan');
    } 
}
 