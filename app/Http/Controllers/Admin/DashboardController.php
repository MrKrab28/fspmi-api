<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IuranItem;
use App\Models\Pengaduan;
use App\Models\Pengeluaran;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'anggota' => User::all()->count(),
            'pengaduanProses' => Pengaduan::where('status', 'diproses')->count(),
            'pengaduanSelesai' => Pengaduan::where('status', 'selesai')->count(),
            'iuran' => IuranItem::all()->sum('nominal'),
            'saldo' => IuranItem::all()->sum('nominal') - Pengeluaran::all()->sum('jumlah'),
        ]);
    }
}
