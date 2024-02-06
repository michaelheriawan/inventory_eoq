<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\EoqBarangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanBarangKeluarController;
use App\Http\Controllers\LaporanBarangMasukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StockOpnameController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [HomeController::class, 'index'])->middleware(['isLogin']);
Route::get('profil/{user}', [HomeController::class, 'show'])->name('home.profil')->middleware(['isLogin']);

Route::middleware(['isLogin', 'isAdmin'])->group(function () {

    Route::get('fetch-barang/{barang}', [BarangController::class, 'fetchData'])->name('barang.fetch');
    Route::get('fetch-harga-beli/{barang}', [BarangMasukController::class, 'fetchHargaBeli'])->name('barang-masuk.fetchHargaBeli');
    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('eoq-barang', EoqBarangController::class);
    Route::resource('barang-masuk', BarangMasukController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);
    Route::resource('stock-opname', StockOpnameController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('users', UserController::class);
});

Route::middleware(['isLogin', 'isPemilik'])->group(function () {
    Route::get('laporan-barang-masuk', [LaporanBarangMasukController::class, 'index'])->name('laporan_barang_masuk.index');
    Route::get('laporan-barang-keluar', [LaporanBarangKeluarController::class, 'index'])->name('laporan_barang_keluar.index');
});

Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login/auth', [LoginController::class, 'authenticate'])->name('login.auth');
Route::get('logout', [LoginController::class, 'logout'])->name('login.logout');
