<?php

use Illuminate\Support\Facades\Route;
// Import Controller yang diperlukan
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

// RUTE UTAMA DAN PUBLIK
Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

// Route::get('/mahasiswa', function () {
//     return 'Halo Mahasiswa';
// });

Route::get('/about', function () {
    return view('halaman-about');
});

// Rute Controller Lama
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
Route::get('pegawai', [PegawaiController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::post('/signup', [HomeController::class, 'signup'])->name('home.signup');


// // RUTE ADMINISTRATOR
// Route::prefix('admin')->group(function() {

//     // --- RUTE OTENTIKASI (AdminAuthController) ---
//     Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
//     Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
//     Route::get('register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register.form');
//     Route::post('register', [AdminAuthController::class, 'register'])->name('admin.register');
//     Route::get('check-session', [AdminAuthController::class, 'checkSession'])->name('admin.check-session');


//     // --- RUTE APLIKASI (AdminController) ---
//     Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
//     Route::get('users', function() { return 'Halaman Manajemen Pengguna'; })->name('admin.users.index');
//     Route::get('articles', function() { return 'Halaman Manajemen Artikel'; })->name('admin.articles.index');
//     Route::get('categories', function() { return 'Kategori & Tag'; })->name('admin.categories.index');
//     Route::get('settings', function() { return 'Pengaturan Situs'; })->name('admin.settings');
//     Route::get('comments', function() { return 'Komentar'; })->name('admin.comments');
//     Route::get('reports', function() { return 'Laporan & Log'; })->name('admin.reports');

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/about', function () {
    return view('halaman-about');
});
Route::get('/mahasiswa/{param1}',[MahasiswaController::class,'show']);
Route::get('home',[HomeController::class,'index']);
Route::get('pegawai',[PegawaiController::class,'index']);


Route::get('/home',[HomeController::class,'index']) ;
Route::post('/signup', [HomeController::class, 'signup'])->name('home.signup');
// Route::get('/', function () {return view('simple-home');});

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/login', [AuthController::class, 'login'])->name('user.login');

Route::get('/go/{page}', [HomeController::class, 'redirectTo']);

// Route untuk menampilkan Form Registrasi
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('auth.register.form');

// Route untuk memproses Registrasi (Named Route)
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register');

// });
Route::get('/dashboard',[DashboardController::class, 'index']) ->name('dashboard');
Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
