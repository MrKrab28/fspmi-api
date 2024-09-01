<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Iuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IuranItem;

class IuranController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('iuran')) {
            $iuran = Iuran::find($request->iuran);
            return view('admin.iuran-detail', compact('iuran'));
        }

        $data = [
            'daftarAnggota' => User::all(),
            'daftariuran' => Iuran::get()
        ];

        return view('admin.iuran', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_anggota' => 'required',
            'nominal' => 'required',
            'tgl_bayar' => 'required',
        ]);

        $iuran = Iuran::where('id_anggota', $request->id_anggota)->first();
        if (!$iuran) {
            $iuran = new Iuran();
            $iuran->id_anggota = $request->id_anggota;
            $iuran->save();
        }

        $item = new IuranItem();
        $item->id_iuran = $iuran->id;
        $item->nominal = $request->nominal;
        $item->tgl_bayar = $request->tgl_bayar;
        $item->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function storeItem(Request $request)
    {
        $iuran = Iuran::find($request->iuran);
        $item = new IuranItem();
        $item->id_iuran = $iuran->id;
        $item->nominal = $request->nominal;
        $item->tgl_bayar = $request->tgl_bayar;
        $item->save();

        return redirect()->back()->with('success', 'Berhasil Menambahkan Data');
    }

    public function destroy(Iuran $iuran)
    {
        $iuran->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
