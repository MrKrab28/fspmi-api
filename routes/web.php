<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IuranController;
use App\Http\Controllers\Admin\PengaduanController;
use App\Http\Controllers\User\PengaduanController as UserPengaduanController;
use App\Models\Pengaduan;

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
Route::post('/logout', [AuthController::class, 'logout'])->name('user-logout');


Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('anggota', [AnggotaController::class, 'index'])->name('anggota-index');
Route::post('anggota/add', [AnggotaController::class, 'store'])->name('anggota-store');
Route::get('anggota/edit{user}', [AnggotaController::class, 'edit'])->name('anggota-edit');
Route::put('anggota/update{user}', [AnggotaController::class, 'update'])->name('anggota-update');
Route::delete('anggota/delete{user}', [AnggotaController::class, 'destroy'])->name('anggota-delete');

Route::get('iuran', [IuranController::class, 'index'])->name('iuran-index');
Route::post('iuran/add', [IuranController::class, 'store'])->name('iuran-store');

Route::post('iuran/add-items', [IuranController::class, 'storeItem'])->name('iuran-store.item');


// admin
Route::get('pengaduan', [PengaduanController::class, 'index'])->name('pengaduan-index');
Route::post('pengaduan/add', [PengaduanController::class, 'store'])->name('pengaduan-store');
Route::post('pengaduan/add-items', [PengaduanController::class, 'storeItem'])->name('pengaduan-store.item');

// user
Route::get('pengaduan-index', [UserPengaduanController::class, 'index'])->name('user-pengaduan-index');

Route::get('pengaduan/user', [UserPengaduanController::class, 'balaspengaduan'])->name('balasPengaduan');
Route::post('pengaduan/user/add', [UserPengaduanController::class, 'store'])->name('user-pengaduan-store');

Route::get('buat-pengaduan', [UserPengaduanController::class , 'buatPengaduan'])->name('user-buat-pengaduan');
Route::post('balas-pengaduan', [PengaduanController::class, 'balasPengaduan'])->name('balas-pengaduan');
Route::get('user-balas-pengaduan', [UserPengaduanController::class, 'balasPengaduan'])->name('user-balas-pengaduan');



Route::get('/user', function(){
    return view('admin.anggota');
})->name('anggota');
