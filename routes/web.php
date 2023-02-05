<?php

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
    return view('workit.dashboard');
});

Route::prefix('/workit')->group(function(){
    // halaman pelayanan
    Route::get('/pelayanan', function(){
        return view('workit.pelayanan');
    })->name('workit.pelayanan');

     // halaman pelayanan
     Route::get('/pemasukan', function(){
        return view('workit.pemasukan');
    })->name('workit.pemasukan');

     // halaman pelayanan
     Route::get('/pengeluaran', function(){
        return view('workit.pengeluaran');
    })->name('workit.pengeluaran');
});