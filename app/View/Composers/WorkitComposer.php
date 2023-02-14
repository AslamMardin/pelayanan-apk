<?php
 
namespace App\View\Composers;
 
use App\Models\Nota;
use App\Models\Pelanggan;
use Illuminate\View\View;
use App\Models\NotaDetail;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
 
class WorkitComposer
{
 
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
       
       $pelanggans = Pelanggan::all();
       $view->with('com_pelanggans', $pelanggans);
       
       $bulan = Pengaturan::first()->bulan;
       $view->with('com_bulan', $bulan);
       
       $nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
       $view->with('com_nama_bulan', $nama_bulan);

    }
}