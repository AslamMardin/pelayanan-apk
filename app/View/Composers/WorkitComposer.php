<?php
 
namespace App\View\Composers;
 
use App\Models\Pelanggan;
use Illuminate\View\View;
 
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
    }
}