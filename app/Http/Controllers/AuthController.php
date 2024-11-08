<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt($credentials)) {
            return redirect()->route('user-dashboard');
        }
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Email atau Password Salah');
    }


    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();


        return redirect()->route('login');
    }
}
