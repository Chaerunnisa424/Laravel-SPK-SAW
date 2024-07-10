<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;

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


Route::resource('login', LoginController::class)->name('index', 'login');
Route::resource('logout', LogoutController::class);
Route::resource('register', RegisterController::class);
Route::resource('home', HomeController::class)->middleware('auth');
Route::resource('user', UserController::class)->middleware('auth');
Route::resource('kost', KostController::class);
Route::resource('kriteria', KriteriaController::class);
Route::resource('sub', SubController::class);
Route::resource('penilaian', PenilaianController::class);
Route::resource('proses', ProsesController::class);
Route::resource('laporan', LaporanController::class);
route::resource('profile', ProfileController::class);

//auth::resource(['verify'=>true]);

Route::controller(SocialiteController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google'); // Pastikan ini benar
    Route::get('auth/google/callback', 'handleGoogleCallback');
    Route::get('auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);
});

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');



// Tampilkan form lupa password
Route::get('forgot-password', function () {
    return view('forgot-password');
})->name('password.request');

// Kirim email reset password
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


// Tampilkan form reset password
Route::get('reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
})->name('password.reset');

// Proses reset password
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


Route::get('/', function () {
    return view('Beranda');
  });

  Route::get('/Kost', function () {
    return view('Kost');
  });

  Route::get('/Kontak', function () {
    return view('Kontak');
  });

  // routes/web.php



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
