<?php

namespace App\Observers;

use App\Models\Nota;
use App\Models\LogAktif;

class NotaObserver
{
    /**
     * Handle the Nota "created" event.
     *
     * @param  \App\Models\Nota  $nota
     * @return void
     */
    public function created(Nota $nota)
    {
        $message = "Nota {$nota->nama_barang} - {$nota->pelanggan->nama} telah ditambahkan";
        LogAktif::create(['keterangan' => $message]);
    }

    /**
     * Handle the Nota "updated" event.
     *
     * @param  \App\Models\Nota  $nota
     * @return void
     */
    public function updated(Nota $nota)
    {
        //
    }

    /**
     * Handle the Nota "deleted" event.
     *
     * @param  \App\Models\Nota  $nota
     * @return void
     */
    public function deleted(Nota $nota)
    {
        $message = "Nota {$nota->nama_barang} - {$nota->pelanggan->nama} telah dihapus";
        LogAktif::create(['keterangan' => $message]);
    }

    /**
     * Handle the Nota "restored" event.
     *
     * @param  \App\Models\Nota  $nota
     * @return void
     */
    public function restored(Nota $nota)
    {
        //
    }

    /**
     * Handle the Nota "force deleted" event.
     *
     * @param  \App\Models\Nota  $nota
     * @return void
     */
    public function forceDeleted(Nota $nota)
    {
        //
    }
}
