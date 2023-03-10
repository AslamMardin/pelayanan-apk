<?php
use Carbon\Carbon;
use App\Models\Pelanggan;
use App\Models\NotaDetail;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\JemputController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KebutuhanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\NotaDetailController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
     Route::get('/pelanggan', [PelangganController::class, 'index'])->name('workit.pelanggan');

     // halaman pemasukan
     Route::get('/pemasukan', [NotaDetailController::class, 'pemasukan'])->name('workit.pemasukan');

     // halaman pengeluaran
     Route::get('/pengeluaran', [NotaDetailController::class, 'pengeluaran'])->name('workit.pengeluaran');
});


Route::get('/pelanggan/import', [PelangganController::class, 'import'])->name('pelanggan.import');
Route::post('/pelanggan/ProsesImport', [PelangganController::class, 'ProsesImport']);
Route::get('/pelanggan/export', [PelangganController::class, 'export']);
Route::get('/pelanggan/sampah', [PelangganController::class, 'sampah'])->name('pelanggan.sampah');
Route::resource('/pelanggan', PelangganController::class);
Route::get('/pelanggan/restore/{id}', [PelangganController::class, 'restore'])->name('pelanggan.restore');
Route::delete('/pelanggan/hapus/{id}', [PelangganController::class, 'hapus'])->name('pelanggan.hapus');


Route::get('/pemasukan/export/', [NotaDetailController::class, 'pemasukanExport']);
Route::get('/pengeluaran/export/', [NotaDetailController::class, 'pengeluaranExport']);


Route::get('/nota/excel', [NotaController::class, 'excel']);
Route::get('/nota/pdf/{nota}', [NotaController::class, 'pdfView'])->name('nota.pdf');
Route::resource('/nota', NotaController::class);

Route::get('register', [RegisteredUserController::class, 'create'])
->name('register');

Route::post('register', [RegisteredUserController::class, 'store']);

Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
Route::put('/pengaturan/update', [PengaturanController::class, 'update'])->name('pengaturan.update');


Route::get('/jemput/export', [JemputController::class, 'export']);
Route::get('/jemput/import', [JemputController::class, 'import'])->name('jemput.import');
Route::post('/jemput/ProsesImport', [JemputController::class, 'ProsesImport']);
Route::resource('/jemput', JemputController::class);

Route::get('/kebutuhan/export', [KebutuhanController::class, 'export']);
Route::get('/kebutuhan/import', [KebutuhanController::class, 'import'])->name('kebutuhan.import');
Route::post('/kebutuhan/ProsesImport', [KebutuhanController::class, 'ProsesImport']);
Route::resource('/kebutuhan', KebutuhanController::class);
});


route::get('/test', function(){
    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Test</h1>');
    return $pdf->stream();
});


require __DIR__.'/auth.php';
