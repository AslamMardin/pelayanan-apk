<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use App\Http\Requests\NotaRequest;
use Carbon\Carbon;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NotaRequest $request)
    {
        
       
        
        Nota::create([
            'jenis' => $request->jenis,
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'pelanggan_id' => $request->pelanggan_id,
            'status' => 'BS'
        ]);

        $pesan = "Nota telah dibuat";
        return redirect()->route('workit.pelayanan')->with('pesan', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($notum)
    {
        $nota = Nota::with('pelanggan', 'notaDetail')->where('id', $notum)->first();
        return view('dashboard.show', [
            'nota' => $nota
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($notum)
    {
       $nota =  Nota::findOrFail($notum);
       $nota->delete();
       $pesan = "{$nota->nama_barang} - {$nota->pelanggan->nama} telah dihapus";
        return redirect()->route('workit.dashboard')->with('pesan', $pesan);
    }
}
