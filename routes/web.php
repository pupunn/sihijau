<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DashboardController;

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



Auth::routes();

Route::get('/', HomeController::class)->name('home');
Route::get('/daftar', [SekolahController::class, 'create'])->name('sekolah.daftar');
Route::post('/daftar', [SekolahController::class, 'store']);

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.create.sekolah');
    Route::get('/download/lampiran/{id}/{i}', [SekolahController::class, 'downloadLampiran'])->name('download.lampiran');
    Route::get('user/set-status/{id}', [SekolahController::class, 'setStatus'])->name('sekolah.setStatus');
    Route::get('/user/edit/{skl:id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit/{skl:id}', [UserController::class, 'update'])->name('user.edit.sekolah');
});

Route::middleware(['auth', 'role:juri'])->group(function () {
    Route::get('/juri', function () {
        return "Halaman Juri";
    });
});

Route::middleware(['auth', 'role:operator sekolah'])->group(function () {
    Route::get('/sekolah', function () {
        return "Halaman Operator Sekolah";
    });
});
