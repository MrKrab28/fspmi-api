<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function get(){
        return response()->json([
            'message' => 'success',
            'daftarPengeluaran' => Pengeluaran::all(),
        ], 200);
    }
}
