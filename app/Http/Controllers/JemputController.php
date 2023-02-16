<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jemput;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Exports\JemputsExport;
use App\Imports\JemputsImport;
use App\Http\Requests\JemputRequest;
use Maatwebsite\Excel\Facades\Excel;

class JemputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jemputs = Jemput::with('pelanggan')->orderBy('created_at')->get();
        $total_transportasi = collect($jemputs)->sum('transportasi');
        return view('jemput.index', [
            'jemputs' => $jemputs,
            'total_transportasi' => $total_transportasi,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('jemput.create', [
            'pelanggans' => $pelanggans
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JemputRequest $request)
    {
        Jemput::create([
            'pelanggan_id' => $request->nama,
            'alamat' => $request->alamat,
            'barang' => $request->barang,
            'transportasi' => $request->transportasi
        ]);
        $pesan = "Data Transport telah ditambah";
        return redirect()->route('jemput.index')->with('pesan', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function show(Jemput $jemput)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function edit(Jemput $jemput)
    {
        $pelanggans = Pelanggan::all();
        return view('jemput.edit', [
            'jemput' => $jemput,
            'pelanggans' => $pelanggans
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function update(JemputRequest $request, Jemput $jemput)
    {
        $jemput->update([
            'pelanggan_id' => $request->nama,
            'alamat' => $request->alamat,
            'barang' => $request->barang,
            'transportasi' => $request->transportasi
        ]);
        $pesan = "Data Transporta telah diubah";
        return redirect()->route('jemput.index')->with('pesan', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jemput  $jemput
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jemput $jemput)
    {
        $jemput->delete();
        $pesan = "Data $jemput->barang telah dihapus";
        return redirect()->route('jemput.index')->with('pesan', $pesan);
    }

    public function export()
    {
        return (new JemputsExport)->download('jemput-'.Carbon::now()->format('d-m-Y').'.xlsx');
    }

    public function import()
    {
        return view('jemput.import');
    }

    public function ProsesImport(Request $request)
    {
        Excel::import(new JemputsImport, $request->file('file'));
        
        return redirect('/jemput')->with('pesan', 'All good!');
    }

    
}
