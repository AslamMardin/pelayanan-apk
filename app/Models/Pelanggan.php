<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected static function booted()
    {
        static::created(function ($pelanggan) {
            $message = "Pelanggan $pelanggan->nama telah ditambahkan";
            LogAktif::create(['keterangan' => $message]);
        });
    }
}
