<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangInController;
use App\Http\Controllers\BarangOutController;
use App\Models\Barang;

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
    return view('backend.master.master');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


route::get('/barang', App\Http\Livewire\Barang\Index::class)->name('barang.index');
route::get('/barang/create', App\Http\Livewire\Barang\Create::class)->name('barang.create');
route::get('/barang/edit/{id}', App\Http\Livewire\Barang\Edit::class)->name('barang.edit');


Route::resource('user', UserController::class);
// Route::resource('barang', BarangController::class);
Route::resource('barangin', BarangInController::class);
Route::resource('barangout', BarangOutController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('penjualan', PenjualanController::class);


require __DIR__.'/auth.php';
