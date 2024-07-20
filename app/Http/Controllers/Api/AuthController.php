<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'no_hp' => 'required',
            'jk' => 'required',
            'foto_profile' => 'required',
            'foto_ktp' => 'required',
        ]);
        $user = new User();

        $foto_profile = $request->file('foto_profile');
        $foto_ktp = $request->file('foto_ktp');

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;
        $user->jk = $request->jk;
        $user->password = bcrypt($request->password);

        if ($foto_profile) {
            File::delete(public_path('f/foto-profile/' . $user->foto_profile));
            $filename = 'user-' . time() . '-profile' . '.' . $foto_profile->extension();
            $user->foto_profile = $filename;
            $foto_profile->move(public_path('f/foto-profile'), $filename);
        }

        if ($foto_ktp) {
            File::delete(public_path('f/foto-ktp/' . $user->foto_ktp));
            $filename = 'user-' . time() . '-ktp' . '.' . $foto_ktp->extension();
            $user->foto_ktp = $filename;
            $foto_ktp->move(public_path('f/foto-ktp'), $filename);
        }
        $user->save();
        return response()->json(['message' => 'Berhasil']);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            $token =  $user->createToken('auth')->plainTextToken;
            return response()->json([
                'message' => 'Berhasil',
                'user' => $user,
                'token' => $token,
            ], 200);
        }
        return response()->json([
            'message' => 'Login failed'
        ], 401);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout Berhasil'], 200);
    }
}
