<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nota extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'pelanggan_id', 'id');
    }

    protected static function booted()
    {
        static::created(function ($nota) {
            $message = "Nota {$nota->pelanggan->nama} telah Dibuat";
            LogAktif::create(['keterangan' => $message]);
        });
    }

    protected function namaBarang(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => ucfirst($value),
        );
    }
    
}
