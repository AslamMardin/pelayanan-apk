<?php

namespace App\Http\Controllers;

use App\Models\NotaDetail;
use Illuminate\Http\Request;

class NotaDetailController extends Controller
{
    public function pemasukan()
    {
        if($this->cekBulan == 100)
        {
            $notaDetails = NotaDetail::with('nota')->where('pemasukan', '!=', 0)->get();
        } else {
            $notaDetails = NotaDetail::with('nota')->whereMonth('created_at', $this->cekBulan)->where('pemasukan', '!=', 0)->get();
        }

        $total_pemasukan = collect($notaDetails)->sum('pemasukan');
        return view('workit.pemasukan',[
            'notaDetails' => $notaDetails,
            'total_pemasukan' => $total_pemasukan
        ]);
    }

    public function pengeluaran()
    {
        if($this->cekBulan == 100)
        {
            $notaDetails = NotaDetail::with('nota')->where('pengeluaran', '!=', 0)->get();
        } else {
            $notaDetails = NotaDetail::with('nota')->whereMonth('created_at', $this->cekBulan)->where('pengeluaran', '!=', 0)->get();
        }
        $total_pengeluaran = collect($notaDetails)->sum('pengeluaran');
        return view('workit.pengeluaran',[
            'notaDetails' => $notaDetails,
            'total_pengeluaran' => $total_pengeluaran
        ]);
    }
}
