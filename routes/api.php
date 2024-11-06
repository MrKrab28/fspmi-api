<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\IuranController;
use App\Http\Controllers\Api\PengaduanController;
use App\Http\Controllers\Api\PengeluaranController;
use App\Http\Controllers\Api\UserController;
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

Route::post('login', [AuthController::class, 'authenticate']);
Route::post('register', [AuthController::class, 'register']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('user', function (Request $request) {
        return response()->json([
            'message' => 'success',
            'user' => $request->user(),
        ]);
    });

    Route::get('iuran-user', [IuranController::class, 'get']);

    Route::get('pengaduan', [PengaduanController::class, 'get']);
    Route::get('pengaduan/{id}', [PengaduanController::class, 'detail']);
    Route::post('pengaduan', [PengaduanController::class, 'store']);
    Route::post('pengaduan/balas', [PengaduanController::class, 'balas']);

    Route::get('pengeluaran', [PengeluaranController::class, 'get']);

    Route::get('faq', [FaqController::class, 'get']);

    Route::patch('password', [UserController::class, 'update']);

    Route::post('logout', [AuthController::class, 'logout']);
});
