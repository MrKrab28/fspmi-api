<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Iuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Iuran\IuranResource;

class IuranController extends Controller
{
    public function index(Request $request )
    {

            $daftarIuran = new IuranResource(Iuran::where('id_anggota', $request->user()->id)->first());
        return response()->json([

            'daftarIuran' => $daftarIuran
        ]);
    }
}
