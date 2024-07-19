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
    public function get(Request $request)
    {
        $iuran = Iuran::where('id_anggota', $request->user()->id)->first();

        if (!$iuran) {
            $iuran = new Iuran();
            $iuran->id_anggota = $request->user()->id;
            $iuran->save();
        }

        return response()->json([
            'iuran' => new IuranResource($iuran),
        ]);
    }
}
