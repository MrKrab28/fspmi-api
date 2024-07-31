<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengeluaran;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    public function index(){
        $pengeluaran = Pengeluaran::all();
        return view('admin.pengeluaran', compact('pengeluaran'));
    }

    public function store(Request $request){
        $data = $request->validate([
            'keperluan' => 'required',
            'jumlah' => 'required',
            'tanggal' => 'required',
        ]);

        Pengeluaran::create($data);

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data Baru');


    }

    public function destroy(Pengeluaran $pengeluaran){
        $pengeluaran->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
