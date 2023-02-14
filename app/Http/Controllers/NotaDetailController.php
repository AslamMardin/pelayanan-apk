<?php

namespace App\Http\Controllers;

use App\Models\NotaDetail;
use Illuminate\Http\Request;

class NotaDetailController extends Controller
{
    public function pemasukan()
    {
        $notaDetails = NotaDetail::with('nota')->where('pemasukan', '!=', 0)->get();

        $total_pemasukan = collect($notaDetails)->sum('pemasukan');
        return view('workit.pemasukan',[
            'notaDetails' => $notaDetails,
            'total_pemasukan' => $total_pemasukan
        ]);
    }

    public function pengeluaran()
    {
        $notaDetails = NotaDetail::with('nota')->where('pengeluaran', '!=', 0)->get();
        $total_pengeluaran = collect($notaDetails)->sum('pengeluaran');
        return view('workit.pengeluaran',[
            'notaDetails' => $notaDetails,
            'total_pengeluaran' => $total_pengeluaran
        ]);
    }
}
