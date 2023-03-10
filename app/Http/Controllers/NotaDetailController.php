<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\NotaDetail;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Exports\PemasukanExport;
use App\Exports\PengeluaranExport;

class NotaDetailController extends Controller
{
    public function pemasukan()
    {
        if($this->cekBulan == 100)
        {
            $notaDetails = NotaDetail::with('nota.pelanggan', 'nota')->where('pemasukan', '!=', 0)->get();
        } else {
            $notaDetails = NotaDetail::with('nota.pelanggan', 'nota')->whereMonth('created_at', $this->cekBulan)->where('pemasukan', '!=', 0)->get();
        }

        $total_keuntungan = collect($notaDetails)->sum('keuntungan');
        return view('workit.pemasukan',[
            'notaDetails' => $notaDetails,
            'total_keuntungan' => $total_keuntungan
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

    public function pemasukanExport()
    {
        $bulan = Pengaturan::first()->bulan;
        return (new PemasukanExport)->forJenis($bulan)->download('pemasukan-'. Carbon::now()->format('d-mY').'.xlsx');
    }

    public function pengeluaranExport()
    {
      
        $bulan = Pengaturan::first()->bulan;
        return (new PengeluaranExport)->forJenis($bulan)->download('pengeluaran-'. Carbon::now()->format('d-mY').'.xlsx');
    }

}
