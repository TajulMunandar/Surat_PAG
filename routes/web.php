<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JsaController;
use App\Http\Controllers\JsaDetailController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanDetailController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/surat')->group(function () {
        Route::resource('/surat-jsa', JsaController::class);
        Route::resource('/surat-jsa-detail', JsaDetailController::class);

        Route::resource('/surat-magang', MagangController::class);

        Route::resource('/surat-peminjaman', PeminjamanController::class);
        Route::resource('/surat-peminjaman-detail', PeminjamanDetailController::class);
    });


    Route::resource('/user', UserController::class);
    Route::post('/user/reset-password', [UserController::class, 'resetPasswordAdmin'])->name('user.resetPasswordAdmin');

    // divisi
    Route::resource('/divisi', DivisiController::class);
});
