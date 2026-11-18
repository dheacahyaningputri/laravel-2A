<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web;
use App\Http\Controllers\KalkulatorController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// agar langsung masuk login (jika sudah login, langsung ke dashboard)
Route::get('/', function () {
    if (session('logged_in')) {
        return redirect('/dashboard');
    }
    return view('login');
})->name('login');

// route proses login
Route::post('/login', [AuthController::class, 'cek']);

// ---------------------------------------------------------------
// Route yang boleh diakses tanpa login
// ---------------------------------------------------------------
Route::get('/web', [Web::class, 'home']);
Route::get('/profil/{nama}', [Web::class, 'profil']);
Route::get('/biodata', [Web::class, 'biodata']);

// Kalkulator
Route::get('/kalkulator', [KalkulatorController::class, 'home']);
Route::post('/kalkulator/proses', [KalkulatorController::class, 'proses']);

// Latihan 1 & 2: Daftar Mahasiswa
Route::get('/daftar/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');

// Latihan 3: Kalkulator Luas Segitiga
Route::get('/kalkulator/segitiga', [KalkulatorController::class, 'segitiga'])
    ->name('kalkulator.segitiga');
Route::post('/kalkulator/segitiga', [KalkulatorController::class, 'hitungSegitiga'])
    ->name('kalkulator.hitung');

// Latihan Olshop
Route::get('/home', [DashboardController::class, 'home']);
Route::get('/product', [DashboardController::class, 'product']);
Route::get('/produk/detail/{harga}', [DashboardController::class, 'detail'])->whereNumber('harga');
Route::get('/about', [DashboardController::class, 'about']);

// ---------------------------------------------------------------
// Route group yang harus login dahulu
// ---------------------------------------------------------------
Route::group(['middleware' => \App\Http\Middleware\IsLogin::class], function () {

    Route::get('/dashboard', [DashboardController::class, 'home']);
    Route::get('/gallery', [DashboardController::class, 'gallery']);

    // CRUD Employe
    Route::get('/employe', [EmployeController::class, 'index']);
    Route::get('/employe/create', [EmployeController::class, 'create']);
    Route::post('/employe/store', [EmployeController::class, 'store']);
    Route::get('/employe/edit/{employe}', [EmployeController::class, 'show']);
    Route::put('/employe/{employe}', [EmployeController::class, 'update']);
    Route::delete('/employe/{employe}', [EmployeController::class, 'destroy']);

    // CRUD Admin
    Route::resource('admin', AdminController::class);

    // Logout
    Route::get('/logout', [AuthController::class, 'logout']);
});