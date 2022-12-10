<?php

namespace App\Http\Controllers\API\AUTH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email'  => 'required',
            'password'  => 'required'
        ]);

        $login = request(['email', 'password']);

        if (!Auth::attempt($login)) {
            return response()->json([
                'error' => 'Login gagal. Harap periksa user',
                'valdasi' => false
            ], 401);
        }

        $user = $request->user();

        return response()->json([
            'token'         => $user->createToken("API TOKEN")->plainTextToken,
            'role'          => $user->role,
            'validasi'      => true
        ], 200);
    }
 
}
