<?php

namespace App\Http\Controllers;

use App\Models\Pengaturan;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        $bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        
        $bulan_sekarang = Pengaturan::first();

        return view('pengaturan.index',[
            'bulan' => $bulan,
            'bulan_sekarang' => $bulan_sekarang->bulan
        ]);
    }

    public function update(Request $request)
    {
        $pengaturan = Pengaturan::first()->update([
            'bulan' => $request->bulan
        ]);
        return redirect()->route('pengaturan')->with('pesan', 'Pengaturan Update');
    }
}
