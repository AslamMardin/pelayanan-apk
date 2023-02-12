<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PelangganController;
use App\Models\Pelanggan;
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

Route::get('/', [DashboardController::class, 'index'])->name('workit.dashboard');

Route::prefix('/workit')->group(function(){
    // halaman pelayanan
    Route::get('/pelayanan', function()
    {
        return view('workit.pelayanan');
    })->name('workit.pelayanan');

     // halaman pelanggan
     Route::get('/pelanggan', function()
     {
        $pelangganTrashed = Pelanggan::onlyTrashed()->get();
        return view('workit.pelanggan', [
            'pelangganTrashed' =>count($pelangganTrashed)
        ]);
    })->name('workit.pelanggan');

     // halaman pemasukan
     Route::get('/pemasukan', function()
     {
        return view('workit.pemasukan');
    })->name('workit.pemasukan');

     // halaman pengeluaran
     Route::get('/pengeluaran', function()
     {
        return view('workit.pengeluaran');
    })->name('workit.pengeluaran');
});


Route::get('/pelanggan/sampah', [PelangganController::class, 'sampah'])->name('pelanggan.sampah');
Route::get('/pelanggan/restore/{id}', [PelangganController::class, 'restore'])->name('pelanggan.restore');
Route::delete('/pelanggan/hapus/{id}', [PelangganController::class, 'hapus'])->name('pelanggan.hapus');
Route::resource('/pelanggan', PelangganController::class);




Route::resource('/nota', NotaController::class);