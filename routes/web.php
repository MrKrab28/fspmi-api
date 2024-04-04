<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('admin.dashboard')->name('dashboard');
// });

Route::get('/', [AuthController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/login', [AuthController::class, 'getLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('authenticate');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('anggota', [AnggotaController::class, 'index'])->name('anggota-index');
Route::post('anggota/add', [AnggotaController::class, 'store'])->name('anggota-store');
Route::get('anggota/edit{user}', [AnggotaController::class, 'edit'])->name('anggota-edit');
Route::put('anggota/update{user}', [AnggotaController::class, 'update'])->name('anggota-update');
Route::delete('anggota/delete{user}', [AnggotaController::class, 'destroy'])->name('anggota-delete');



Route::get('/user', function(){
    return view('admin.anggota');
})->name('anggota');
