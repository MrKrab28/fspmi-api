<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Iuran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Resources\IuranResource;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = User::find($request->user()->id);
        $user->password = bcrypt($request->password);

        $user->update();
        return response()->json([
            'message' => 'Berhasil'
        ]);
    }
}
