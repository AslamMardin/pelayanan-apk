<?php
use App\Models\Pelanggan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\NotaDetailController;
use App\Models\NotaDetail;

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



///auth

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('workit.dashboard');
Route::get('/dashboard/{id}', [DashboardController::class, 'inputBayar'])->name('dashboard.input.bayar');

Route::post('/dashboard/bayar/{id}', [DashboardController::class, 'bayar'])->name('dashboard.bayar');

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
     Route::get('/pemasukan', [NotaDetailController::class, 'pemasukan'])->name('workit.pemasukan');

     // halaman pengeluaran
     Route::get('/pengeluaran', [NotaDetailController::class, 'pengeluaran'])->name('workit.pengeluaran');
});


Route::get('/pelanggan/sampah', [PelangganController::class, 'sampah'])->name('pelanggan.sampah');
Route::get('/pelanggan/export', [PelangganController::class, 'export']);
Route::get('/pelanggan/restore/{id}', [PelangganController::class, 'restore'])->name('pelanggan.restore');
Route::delete('/pelanggan/hapus/{id}', [PelangganController::class, 'hapus'])->name('pelanggan.hapus');
Route::resource('/pelanggan', PelangganController::class);


Route::get('/pemasukan/export', [NotaDetailController::class, 'export']);
Route::get('/pengeluaran/export', [NotaDetailController::class, 'export']);


Route::get('/nota/excel', [NotaController::class, 'excel']);
Route::resource('/nota', NotaController::class);

  Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

});



require __DIR__.'/auth.php';
