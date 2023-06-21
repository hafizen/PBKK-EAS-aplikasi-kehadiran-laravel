<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KodePresensiController;
use App\Http\Controllers\PertemuanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return view('auth.login');
    })->name('auth.login');

    Route::post('/login', [AuthenticationController::class, 'store'])->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::get('/kelas/{id:uuid}', [KelasController::class, 'get'])->name('kelas');
    Route::get('/kelas/{id:uuid}/tambah-pertemuan', [PertemuanController::class, 'tambah'])->name('tambah-pertemuan');
    Route::post('/kelas/{id:uuid}/tambah-pertemuan', [PertemuanController::class, 'tambahAction']);
    Route::get('/kelas/{kelasId:uuid}/pertemuan/{pertemuanId:uuid}/ubah', [PertemuanController::class, 'ubah'])->name('ubah-pertemuan');
    Route::post('/kelas/{kelasId:uuid}/pertemuan/{pertemuanId:uuid}/ubah', [PertemuanController::class, 'ubahAction']);

    Route::get('/pertemuan/{id:uuid}', [PertemuanController::class, 'get'])->name('pertemuan')->middleware('role:dosen');
    Route::post('/pertemuan/{id:uuid}/mulai', [PertemuanController::class,'mulaiAction'])->name('mulai-pertemuan');
    Route::post('/pertemuan/{id:uuid}/akhiri', [PertemuanController::class,'akhiriAction'])->name('akhiri-pertemuan');

    Route::get('/kode-presensi/{pertemuanId:uuid}', [KodePresensiController::class,'index'])->name('kode-presensi');
});
