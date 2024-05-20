<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Iuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IuranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('iuran')) {
            $iuran = Iuran::find($request->iuran);
            return view('user.iuran-detail', compact('iuran'));  // method new 
        }

        $data = [
            'daftarAnggota' => User::all(),
            'daftariuran' => Iuran::where('id_anggota', Auth::user()->id)->get()
        ];

        return view('user.iuran', $data);
    }
}
