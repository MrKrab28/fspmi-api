<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Iuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Resources\IuranResource;

class UserController extends Controller
{

    public function index(Request $request){

        $user = User::find($request->user()->id);
        return response()->json([
            'detailUser' => new UserResource($user)
        ], 200);

    }




    public function update(Request $request)
    {
        $user = User::find($request->user()->id);
        $foto_profile = $request->file('foto_profile');
        $foto_ktp = $request->file('foto_ktp');

        $user->nama = $request->nama;
        $user->no_hp = $request->no_hp;
        $user->jk = $request->jk;
        if($request->password){

            $user->password = bcrypt($request->password);
        }

        if ($foto_profile) {

            File::delete(public_path('f/foto-profile/' . $user->foto_profile));
            $filename = 'user-' . time() . '-profile' . '.' . $foto_profile->extension();
            $user->foto_profile = $filename;
            $foto_profile->move(public_path('f/foto-profile'), $filename);
        }
        if ($foto_ktp) {

            File::delete(public_path('f/foto-ktp/' . $user->foto_ktp));
            $filename = 'user-' . time() . '-ktp'. '.' . $foto_ktp->extension();
            $user->foto_ktp = $filename;
            $foto_ktp->move(public_path('f/foto-ktp'), $filename);
        }

        $user->update();
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}
