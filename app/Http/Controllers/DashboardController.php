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
        $notas = Nota::latest()->get();
        $logs = LogAktif::latest()->limit(8)->get();
        return view('workit.dashboard', [
            'notas' => $notas,
            'logs' => $logs
        ]);
    }

    public function inputBayar($id)
    {
        $nota = Nota::findOrFail($id);
        return view('dashboard.input_bayar', ['nota' => $nota]);
    }

    public function bayar(Request $request,$id)
    {
        $request['garansi'] = Carbon::now()->addMonth($request->garansi)->format('Y-m-d');


        $nota = Nota::with('notaDetail')->findOrFail($id);
        if($nota->notaDetail == null){
            $nota->notaDetail()->save(new NotaDetail([
                'pengeluaran' => $request->pengeluaran,
                'pemasukan' => $request->pemasukan,
                'garansi' => $request->garansi
            ]));
        }else {
            $nota->notaDetail->update([
                'pengeluaran' => $request->pengeluaran,
                'pemasukan' => $request->pemasukan,
                'garansi' => $request->garansi
            ]);
        }

        return redirect()->route('workit.dashboard');
    }
}
