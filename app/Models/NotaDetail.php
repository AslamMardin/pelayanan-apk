<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaDetail extends Model
{
    use HasFactory;

    protected $fillable = ['garansi', 'pemasukan', 'pengeluaran', 'nota_id', 'label_garansi'];
}
