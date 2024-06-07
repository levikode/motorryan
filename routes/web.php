<?php

use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\LaporanController;

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
Route::get('/',function(){
    return view('welcome',[
        "title"=>"Dashboard"
    ]);
})->middleware('auth');
 

Route::resource('pengguna',UserController::class)
->except('destroy','create','show','upadate','edit')->middleware('auth');

Route::resource('produk',ProdukController::class)->middleware('auth');



Route::resource('pembeli', PembeliController::class)
    ->except('destroy')->middleware('auth'); 

Route::get('login',[LoginController::class,'loginView'])->name('login');

Route::post('login',[LoginController::class,'authenticate']);

Route::post('logout',[LoginController::class,'logout'])->name('auth.logout')->middleware('auth');
  
Route::get('penjualan',function(){
    return view('penjualan.index',[
        "title"=>"Penjualan"
    ]);
})->name('penjualan')->middleware('auth');

Route::get('transaksi',function(){
    return view('Penjualan.transaksis',[
        "title"=>"transaksi"
    ]);
})->middleware('auth');

Route::get('cetakReceipt',[CetakController::class,'receipt'])->name('cetakReceipt')->middleware('auth');

Route::get('/',[WelcomeController::class,'welcome'])->middleware('auth');

Route::get('laporan', [LaporanController::class, 'index'])->name('laporan.index');