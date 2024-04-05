<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index(Request $request){
        if($request->has('pengaduan')){
            $pengaduan = Pengaduan::find($request->pengaduan);
            return view('admin.pengaduan-detail', compact('pengaduan'));
        }

        $data = [
            'daftarPengaduan' => Pengaduan::all(),
            'daftarAnggota' => User::all()
        ];
        return view('admin.pengaduan', compact('pengaduan'));
    }
}
