<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = User::all();
        return view('admin.anggota', compact('anggota'));
    }

    public function store(Request $request)
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
            $filename = 'user-' . time() . '-ktp'. '.' . $foto_ktp->extension();
            $user->foto_ktp = $filename;
            $foto_ktp->move(public_path('f/foto-ktp'), $filename);
        }

        $user->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function edit(User $user)
    {
        return view('admin.anggota-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
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
        return redirect()->back()->with( 'success' ,'Berhasil Menambahkan Data');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
