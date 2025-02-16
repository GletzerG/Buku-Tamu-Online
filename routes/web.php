<?php

use App\Http\Controllers\Admin\TamuController as AdminTamuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\TamuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::post('simpan-bukutamu', [TamuController::class, 'simpanTamu'])->name('simpan-bukutamu');
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('admin/tamu', [AdminTamuController::class, 'index'])->name('admin-tamu');