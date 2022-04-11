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

// barang
route::get('/barang', App\Http\Livewire\Barang\Index::class)->name('barang.index');
route::get('/barang/create', App\Http\Livewire\Barang\Create::class)->name('barang.create');
route::get('/barang/edit/{id}', App\Http\Livewire\Barang\Edit::class)->name('barang.edit');

// supplier
route::get('supplier', App\Http\Livewire\Supplier\Index::class)->name('supplier.index');
route::get('supplier/create', App\Http\Livewire\Supplier\Create::class)->name('supplier.create');
route::get('supplier/edit/{id}', App\Http\Livewire\Supplier\Edit::class)->name('supplier.edit');

// barangIn
route::get('barang-masuk', App\Http\Livewire\BarangIn\Index::class)->name('barangIn.index');
route::get('barang-masuk/create', App\Http\Livewire\BarangIn\Create::class)->name('barangIn.create');

// barangOut
route::get('barang-keluar', App\Http\Livewire\BarangOut\Index::class)->name('barangOut.index');
route::get('barang-keluar/create', App\Http\Livewire\BarangOut\Create::class)->name('barangOut.create');


Route::resource('user', UserController::class);
// Route::resource('barangout', BarangOutController::class);
Route::resource('penjualan', PenjualanController::class);


require __DIR__.'/auth.php';
