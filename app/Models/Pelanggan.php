<?php

namespace App\Models;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

   public function nota()
   {
       return $this->hasMany(Nota::class, 'pelanggan_id', 'id');
   }
}
