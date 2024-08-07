<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function edit(Admin $admin){
        return view('admin.profile', compact('admin'));
    }

    public function update(Request $request){
        $admin = Admin::find(auth()->user()->id);

        $admin->nama = $request->nama;
        $admin->email = $request->email;

        if($request->password){
            $admin->password =bcrypt($request->password);
        }

        $admin->update();
        return redirect()->back()->with('success', 'Berhasil Mengubah Data');
    }
}
