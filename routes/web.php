<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\EoqBarangController;
use App\Http\Controllers\KategoriController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('fetch-barang/{barang}', [BarangController::class, 'fetchData'])->name('barang.fetch');
Route::resource('kategori', KategoriController::class);
Route::resource('barang', BarangController::class);
Route::resource('eoq-barang', EoqBarangController::class);
Route::resource('barang-masuk', BarangMasukController::class);
Route::resource('barang-keluar', BarangKeluarController::class);
Route::resource('stock-opname', StockOpnameController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('users', UserController::class);
