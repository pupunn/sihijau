<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JuriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorController;
use App\Models\Indikator;

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
Route::post('/ubah/periode', [AdminController::class, 'ubahPeriode'])->name('ubah.periode')->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/create', [UserController::class, 'store'])->name('user.create.sekolah');
    Route::get('/download/lampiran/{skl:id}/{i}', [SekolahController::class, 'downloadLampiran'])->name('download.lampirann');
    Route::get('/user/setStatus/{id}', [SekolahController::class, 'setStatus'])->name('sekolah.setStatus');
    Route::get('/user/sendEmail/{id}', [SekolahController::class, 'sendEmail'])->name('sekolah.sendEmail');
    Route::get('/user/edit/{skl:id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/edit/{skl:id}', [UserController::class, 'update'])->name('user.edit.sekolah');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    Route::delete('/sekolah/delete/{id}', [SekolahController::class, 'destroy'])->name('sekolah.delete');

    Route::post('/user/juri/create', [UserController::class, 'storeJuri'])->name('user.create.juri');
    Route::delete('/user/juri/delete/{id}', [UserController::class, 'destroyJuri'])->name('user.delete.juri');

    Route::get('/aspek', [AdminController::class, 'aspek'])->name('admin.aspek');
    Route::get('/aspek/indikator/{id}', [AdminController::class, 'indikator'])->name('admin.aspek.indikator');
    Route::post('/create/aspek', [AdminController::class, 'store'])->name('admin.create.aspek');
    Route::delete('/delete/aspek/{id}', [AdminController::class, 'destroy'])->name('admin.delete.aspek');
    Route::post('/create/indikator', [AdminController::class, 'storeIndikator'])->name('admin.create.indikator');
    Route::post('/edit/indikator/{id}', [AdminController::class, 'editIndikator'])->name('admin.edit.indikator');
    Route::delete('/delete/indikator/{id}', [AdminController::class, 'destroyIndikator'])->name('admin.delete.indikator');
    Route::post('/create/template', [AdminController::class, 'storeTemplate'])->name('admin.create.template');
    Route::get('/download/template/{id}', [IndikatorController::class, 'downloadTemplate'])->name('admin.download.template');
    Route::post('/create/kriteria', [AdminController::class, 'storeKriteria'])->name('admin.create.kriteria');
    Route::get('/delete/kriteria/{idi}/{id}', [AdminController::class, 'destroyKriteria'])->name('admin.delete.kriteria');
    Route::post('/create/satuan', [AdminController::class, 'storeSatuan'])->name('admin.create.satuan');
    Route::get('/delete/satuan/{id}', [AdminController::class, 'destroySatuan'])->name('admin.delete.satuan');
});

Route::prefix('juri')->middleware(['auth', 'role:juri'])->group(function () {
    Route::get('/', [DashboardController::class, 'juri'])->name('juri.dashboard');
    Route::get('/peserta', [JuriController::class, 'sekolah'])->name('juri.peserta');
    Route::get('/peserta/{id}', [JuriController::class, 'isian'])->name('juri.detail');
    Route::post('/nilai', [JuriController::class, 'store'])->name('juri.nilai');
    Route::get('/download/lampiran/{id}', [JuriController::class, 'downloadLampiran'])->name('juri.download.lampiran');
    Route::get('/download/laporan/{id}', [JuriController::class, 'cetakPdf'])->name('juri.download.rekap');
    Route::get('/download/report', [JuriController::class, 'exportExcel'])->name('juri.download.excel');
    Route::get('/download/zipBukti/{id}', [JuriController::class, 'downloadZipBukti'])->name('juri.download.buktiZip');
});

Route::prefix('sekolah')->middleware(['auth', 'role:operator sekolah'])->group(function () {
    Route::get('/', [DashboardController::class, 'sekolah'])->name('sekolah.dashboard');
    Route::post('/jawaban/post', [IndikatorController::class, 'store'])->name('jawaban');
    Route::get('/indikator/{id}', [IndikatorController::class, 'indikator'])->name('sekolah.indikator');
    Route::get('/download/template/{id}', [IndikatorController::class, 'downloadTemplate'])->name('download.template');
    Route::get('/download/lampiran/{id}', [IndikatorController::class, 'downloadLampiran'])->name('download.lampiran');
});
