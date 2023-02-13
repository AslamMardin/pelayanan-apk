<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\LogAktif;
use App\Models\NotaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $notas = Nota::with('notaDetail')->latest()->get();
        $logs = LogAktif::latest()->limit(8)->get();
        return view('workit.dashboard', [
            'notas' => $notas,
            'logs' => $logs
        ]);
    }

    public function inputBayar($id)
    {
        $nota = Nota::with('notaDetail')->findOrFail($id);
        return view('dashboard.input_bayar', ['nota' => $nota]);
    }


    public function bayar(Request $request,$id)
    {
       
        $nota = Nota::where('id',$id)->first();
        $cek = Nota::findOrFail($id)->notaDetail;
        if(!$cek)
        {
            $nota->notaDetail()->create([
                'pengeluaran' => $request->pengeluaran,
                'pemasukan' => $request->pemasukan,
                'garansi' => Carbon::now()->addMonth($request->garansi)->format('Y-m-d'),
                'label_garansi' => $request->garansi
            ]);
            
        }else {
            
            $nota->notaDetail()->update([
                    'pengeluaran' => $request->pengeluaran,
                    'pemasukan' => $request->pemasukan,
                    'garansi' => Carbon::now()->addMonth($request->garansi)->format('Y-m-d'),
                    'label_garansi' => $request->garansi
            ]);
        }
        return redirect()->route('workit.dashboard');
    }
}