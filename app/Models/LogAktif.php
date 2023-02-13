<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAktif extends Model
{
    use HasFactory;
    protected $fillable = ['keterangan'];
    protected $table = 'log_aktif';
}
