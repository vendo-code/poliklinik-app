<?php

use App\Http\Controllers\Admin\AdminPoliController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\PasienController;
use App\Http\Controllers\Admin\ObatController;
use App\Http\Controllers\Dokter\JadwalPeriksaController;
use App\Http\Controllers\Dokter\PeriksaPasienController; 
use App\Http\Controllers\Pasien\PoliController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Models\Poli;
use App\Models\User;
use App\Models\Obat;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Admin (Mengirim data statistik ke view admin.dashboard)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalPoli = Poli::count();
        $totalDokter = User::where('role', 'dokter')->count();
        $totalPasien = User::where('role', 'pasien')->count();
        $totalObat = Obat::count();

        return view('admin.dashboard', compact('totalPoli', 'totalDokter', 'totalPasien', 'totalObat'));
    })->name('dashboard');

    Route::resource('polis', AdminPoliController::class);
    Route::resource('dokters', DokterController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('obat', ObatController::class);
});

// Route Dokter
Route::middleware(['auth', 'role:dokter'])->prefix('dokter')->name('dokter.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dokter.dashboard');
    })->name('dashboard');

    Route::resource('jadwal-periksa', JadwalPeriksaController::class);
    Route::resource('periksa-pasien', PeriksaPasienController::class);
    Route::get('/riwayat-pasien', [PeriksaPasienController::class, 'riwayat'])->name('riwayat-pasien.index');
});

// Route Pasien
Route::middleware(['auth', 'role:pasien'])->prefix('pasien')->name('pasien.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pasien.dashboard');
    })->name('dashboard');

    Route::get('/daftar-poli', [App\Http\Controllers\Pasien\PoliController::class, 'index'])->name('daftar-poli.index');
    Route::post('/daftar-poli', [App\Http\Controllers\Pasien\PoliController::class, 'store'])->name('daftar-poli.store');
});