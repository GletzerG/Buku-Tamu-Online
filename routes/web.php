<?php

use App\Http\Controllers\Admin\TamuController as AdminTamuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TamuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return view('index');
});

Route::post('simpan-bukutamu', [TamuController::class, 'simpanTamu'])->name('simpan-bukutamu');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('admin/tamu', [AdminTamuController::class, 'index'])->name('admin-tamu');
Route::post('/store', [TamuController::class, 'store']);
Route::get('admin/form-edit/{id}', [AdminTamuController::class, 'formEdit'])->name('admin-form-edit');
Route::get('admin/form-tambah', [AdminTamuController::class, 'formTambah'])->name('admin-form-tambah');
Route::post('admin/simpan-data', [AdminTamuController::class, 'simpanData'])->name('admin-simpan-data');