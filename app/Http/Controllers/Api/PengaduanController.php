<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanBalasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PengaduanController extends Controller
{
    public function get()
    {
        return response()->json([
            'message' => 'success',
            'daftarPengaduan' => Pengaduan::with(['balasan'])->get(),
        ], 200);
    }

    public function store(Request $request)
    {
        $foto_lampiran = $request->file('lampiran');

        $pengaduan = new Pengaduan();
        $pengaduan->id_anggota = $request->user()->id;
        $pengaduan->judul = $request->judul;
        $pengaduan->detail = $request->detail;
        $pengaduan->tgl_pengaduan = now();

        if ($foto_lampiran) {
            File::delete(public_path('f/foto-lampiran/' . $pengaduan->lampiran));
            $filename = 'user-' . time() . '-lampiran' . '.' . $foto_lampiran->extension();
            $pengaduan->lampiran = $filename;
            $foto_lampiran->move(public_path('f/foto-lampiran'), $filename);
        }

        $pengaduan->save();

        return response()->json([
            'message' => 'success',
            'pengaduan' => $pengaduan
        ], 200);
    }

    public function balas(Request $request)
    {
        $pengaduan = Pengaduan::find($request->id_pengaduan);

        $balasan = new PengaduanBalasan();
        $balasan->id_pengaduan = $pengaduan->id;
        $balasan->pengirim = 'anggota';
        $balasan->isi_balasan = $request->balasan;
        $balasan->save();

        return response()->json([
            'message' => 'success',
            'balasan' => $balasan
        ], 200);
    }
}
