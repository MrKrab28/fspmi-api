<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\PengaduanBalasan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class PengaduanController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }

    public function index(Request $request)
    {
        if ($request->has('pengaduan')) {
            $pengaduan = Pengaduan::find($request->pengaduan);

            return view('user.pengaduan-detail', compact('pengaduan'));
        }

        $data = [
            'daftarPengaduan' => Pengaduan::where('id_anggota', Auth::user()->id)->get(),
            'daftarAnggota' => User::all()
        ];
        return view('user.pengaduan', $data);
    }


    public function store(Request $request)
    {

        $foto_lampiran = $request->file('lampiran');
        $pengaduan = new Pengaduan();
        $pengaduan->id_anggota = auth()->user()->id;
        $pengaduan->judul = $request->judul;
        $pengaduan->detail = $request->detail;
        $pengaduan->tgl_pengaduan = Carbon::now();

        if ($foto_lampiran) {

            File::delete(public_path('f/foto-lampiran/' . $pengaduan->lampiran));
            $filename = 'user-' . time() . '-lampiran' . '.' . $foto_lampiran->extension();
            $pengaduan->lampiran = $filename;
            $foto_lampiran->move(public_path('f/foto-lampiran'), $filename);
        }

        $pengaduan->save();

        return redirect()->back()->with('success', 'Berhasil Mengirim Pengaduan');
    }

    public function buatPengaduan()
    {
        return view('user.buat-pengaduan');
    }
    // public function balasPengaduan(){
    //     $data = [
    //         'daftarPengaduan' => Pengaduan::all(),
    //         'daftarAnggota' => User::all()
    //     ];
    //     return view('user.pengaduan-detail', $data);
    // }

    public function balasPengaduan(Request $request)
    {
        $pengaduan = Pengaduan::find($request->pengaduan);
        $balas = new PengaduanBalasan();
        $balas->id_pengaduan = $request->id_pengaduan;
        $balas->pengirim = 'anggota';
        // $balas->parent = $request->parent;
        $balas->isi_balasan = $request->isi_balasan;
        $balas->save();
        return redirect()->back()->with('success', 'Pesan Terkirim');
    }
}
