<?php

use App\Http\Controllers\Api\AuthController as ApiAuthController;
use App\Http\Controllers\Api\IuranController as ApiIuranController;
use App\Http\Controllers\Api\PengaduanController;
use App\Http\Controllers\Api\UserController as ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [ApiAuthController::class, 'authenticate']);
Route::post('register', [ApiAuthController::class, 'register']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('user', function (Request $request) {
        return response()->json([
            'message' => 'success',
            'user' => $request->user(),
        ]);
    });

    Route::get('iuran-user', [ApiIuranController::class, 'get']);

    Route::get('pengaduan', [PengaduanController::class, 'get']);
    Route::post('pengaduan', [PengaduanController::class, 'store']);
    Route::post('pengaduan/balas', [PengaduanController::class, 'balas']);

    Route::get('profile', [ApiUserController::class, 'index']);
    Route::put('profile/update', [ApiUserController::class, 'update']);
    Route::get('logout', [ApiAuthController::class, 'logout']);
});
