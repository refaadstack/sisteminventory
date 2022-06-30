<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangInController;
use App\Http\Controllers\BarangOutController;
use App\Http\Controllers\ExportController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

route::get('/login', function () {
    return view('auth.login');
})->name('login');

route::group(['middleware'=>['auth','checkRole:admin,superAdmin']],function(){

    // barang    
    route::get('/barang', App\Http\Livewire\Barang\Index::class)->name('barang.index');
    route::get('/barang/create', App\Http\Livewire\Barang\Create::class)->name('barang.create');
    route::get('/barang/edit/{id}', App\Http\Livewire\Barang\Edit::class)->name('barang.edit');
    route::delete('/barang/destroy/{id}', [BarangController::class,'destroy'])->name('barang.destroy');
    
    // supplier
    route::get('supplier', App\Http\Livewire\Supplier\Index::class)->name('supplier.index');
    route::get('supplier/create', App\Http\Livewire\Supplier\Create::class)->name('supplier.create');
    route::get('supplier/edit/{id}', App\Http\Livewire\Supplier\Edit::class)->name('supplier.edit');
    route::delete('supplier/destroy/{id}', [SupplierController::class,'destroy'])->name('supplier.destroy');

    // barangIn
    route::get('barang-masuk', App\Http\Livewire\BarangIn\Index::class)->name('barangIn.index');
    route::get('barang-masuk/create', App\Http\Livewire\BarangIn\Create::class)->name('barangIn.create');
    route::delete('/barangin/destroy/{id}', [BarangInController::class,'destroy'])->name('barangIn.destroy');

    // barangOut
    route::get('barang-keluar', App\Http\Livewire\BarangOut\Index::class)->name('barangOut.index');
    route::get('barang-keluar/create', App\Http\Livewire\BarangOut\Create::class)->name('barangOut.create');
    route::delete('/barangOut/destroy/{id}', [BarangOutController::class,'destroy'])->name('barangOut.destroy');

    // Route::resource('user', UserController::class);
    // Route::resource('barangout', BarangOutController::class);
    route::get('/', App\http\Livewire\Dashboard\Index::class)->name('home.index');
    // Route::resource('penjualan', PenjualanController::class);
    route::get('/export/barang', [ExportController::class, 'exportbarang'])->name('export.barang');
    route::get('/export/barangIn', [ExportController::class, 'exportbarangIn'])->name('export.barangIn');
    route::get('/export/barangOut', [ExportController::class, 'exportbarangOut'])->name('export.barangOut');
    route::get('/export/supplier', [ExportController::class, 'exportsupplier'])->name('export.supplier');
});


route::group(['middleware'=>['auth','checkRole:superAdmin']],function(){
    // User
    route::get('user', App\Http\Livewire\User\Index::class)->name('user.index');
    route::get('user/create', App\Http\Livewire\User\Create::class)->name('user.create');
    route::get('user/edit/{id}', App\Http\Livewire\User\Edit::class)->name('user.edit');
    route::delete('/user/destroy/{id}', [UserController::class,'destroy'])->name('user.destroy');
});
require __DIR__.'/auth.php';
