<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use App\Models\PengaduanItem;
use App\Models\PengaduanBalasan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PengaduanController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('id');
    }



    public function index(Request $request){
        if($request->has('pengaduan')){
            $pengaduan= Pengaduan::find($request->pengaduan);

                    return view('admin.pengaduan-detail', compact('pengaduan'));

        }

        $data = [
            'daftarPengaduan' => Pengaduan::all(),
            'daftarAnggota' => User::all()
        ];
        return view('admin.pengaduan', $data);
    }


    public function status(){

    }

    public function balasPengaduan(Request $request){

        $pengaduan = Pengaduan::find($request->pengaduan);
        if($pengaduan->status ===  'selesai'){
            return redirect()->back()->with('Error', '');
        }

        $balas = new PengaduanBalasan();
        $balas->id_pengaduan = $request->id_pengaduan;
        $balas->pengirim = 'admin';
        // $balas->parent = $request->parent;
        $balas->isi_balasan = $request->isi_balasan;
        $balas->save();
        return redirect()->back()->with('success', 'Pesan Terkirim');
     }

     public function selesaikanPengaduan(Request $request){
        $pengaduan = Pengaduan::find($request->pengaduan);

        $pengaduan->status = 'selesai';
        $pengaduan->update();

        return redirect()->back();
     }
}
