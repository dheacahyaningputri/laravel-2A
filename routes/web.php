<?php

use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

// Latihan 1 & 2: Daftar Mahasiswa
Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

// Latihan 3: Kalkulator Luas Segitiga
Route::get('/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])
    ->name('kalkulator.segitiga');
Route::post('/kalkulator/segitiga', [KalkulatorController::class, 'hitungSegitiga'])
    ->name('kalkulator.hitung');




Route::get('/', fn () => redirect('/home'));
Route::get('/home', [DashboardController::class, 'home']);
Route::get('/product', [DashboardController::class, 'product']);
Route::get('/produk/detail/{harga}', [DashboardController::class, 'detail'])->whereNumber('harga');
Route::get('/about', [DashboardController::class, 'about']);




//dibawah sendiri
Route::get('/employe',[EmployeController::class, 'index']);

Route::get('/employe',[EmployeController::class, 'index']);
Route::get('/employe/create',[EmployeController::class, 'create']);
Route::post('/employe/store',[EmployeController::class, 'store']);
Route::get('/employe/edit/{employe}',[EmployeController::class, 'show']);
Route::put('/employe/{employe}',[EmployeController::class, 'update']);
Route::delete('/employe/{employe}',[EmployeController::class, 'destroy']);

    