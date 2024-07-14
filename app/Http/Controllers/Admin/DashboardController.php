<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IuranItem;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'anggota' => User::all()->count(),
            'pengaduan' => Pengaduan::all()->count(),
            'iuran' => IuranItem::all()->sum('nominal'),
        ]);
    }
}
