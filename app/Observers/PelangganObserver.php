<?php

namespace App\Observers;

use App\Models\LogAktif;
use App\Models\Pelanggan;

class PelangganObserver
{
    /**
     * Handle the Pelanggan "created" event.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return void
     */
    public function created(Pelanggan $pelanggan)
    {
        $message = "Pelanggan $pelanggan->nama telah ditambahkan";
        LogAktif::create(['keterangan' => $message]);
    }

    /**
     * Handle the Pelanggan "updated" event.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return void
     */
    public function updated(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Handle the Pelanggan "deleted" event.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return void
     */
    public function deleted(Pelanggan $pelanggan)
    {
        $message = "Pelanggan $pelanggan->nama telah dihapus";
        LogAktif::create(['keterangan' => $message]);
    }

    /**
     * Handle the Pelanggan "restored" event.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return void
     */
    public function restored(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Handle the Pelanggan "force deleted" event.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return void
     */
    public function forceDeleted(Pelanggan $pelanggan)
    {
        //
    }
}
