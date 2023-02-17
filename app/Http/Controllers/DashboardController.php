<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\LogAktif;
use App\Models\Pelanggan;
use App\Models\NotaDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Requests\BayarRequest;
use App\Models\Jemput;
use App\Models\Kebutuhan;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('bulan_filter'))
        {
            $pelanggans = Pelanggan::whereMonth('created_at', $request->get('bulan_filter'))->get();
            $notas = Nota::with('notaDetail')->where('status', 'BS')->whereMonth('created_at', $request->get('bulan_filter'))->latest()->paginate();
            $notaDetail = NotaDetail::with('nota.pelanggan')->whereMonth('created_at', $request->get('bulan_filter'))->get();
        }
        else
        {
            if($this->cekBulan == 100)
            {
            $pelanggans = Pelanggan::all();
            $notaDetail = NotaDetail::with('nota.pelanggan')->get();
            $jemput = Jemput::all();
            $kebutuhan = Kebutuhan::all();
            }else {
            $pelanggans = Pelanggan::whereMonth('created_at', $this->cekBulan)->get();
            $notas = Nota::with('notaDetail')->whereMonth('created_at', $this->cekBulan)->orWhere('status', 'BS')->latest()->paginate();
            $jemput = Jemput::whereMonth('created_at', $this->cekBulan)->get();
            $kebutuhan = Kebutuhan::whereMonth('created_at', $this->cekBulan)->get();
            $notaDetail = NotaDetail::with('nota.pelanggan')->whereMonth('created_at', $this->cekBulan)->get();
            }
        
    }
        

        $total_jemput = collect($jemput)->sum('transportasi');
        $total_kebutuhan = collect($kebutuhan)->sum('harga');
        $total_pengeluaran = ($total_jemput + $total_kebutuhan);
        $total_keuntungan = collect($notaDetail)->sum('keuntungan');
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $logs = LogAktif::latest()->limit(8)->get();

        return view('workit.dashboard', [
            'notas' => $notas,
            'logs' => $logs,
            'pelanggans' => $pelanggans,
            'total_keuntungan' => $total_keuntungan,
            'total_pengeluaran' => $total_pengeluaran,
            'bulan' => $bulan
        ]);
    }

    public function inputBayar($id)
    {
        $nota = Nota::with('notaDetail')->findOrFail($id);
        return view('dashboard.input_bayar', [
            'nota' => $nota
        ]);
    }

    

    public function bayar(BayarRequest $request,$id)
    {
        $nota = Nota::where('id',$id)->first();
        $cek = Nota::findOrFail($id)->notaDetail;

        $data = [
            'pengeluaran' => $request->pengeluaran,
            'pemasukan' => $request->pemasukan,
            'keuntungan' => $request->pemasukan - $request->pengeluaran,
            'garansi' => Carbon::now()->addMonth($request->garansi)->format('Y-m-d'),
            'label_garansi' => $request->garansi
        ];

        if(!$cek)
        {
            $nota->notaDetail()->create($data);
            
        }else {
            
            $nota->notaDetail()->update($data);
        }

        if($request->has('status'))
        {
            $nota->status = "S";
        }else {
            $nota->status = "BS";

        }
        $nota->save();
        return redirect()->route('workit.dashboard')->with('pesan', 'Pembayaran Berhasil');
    }

}
