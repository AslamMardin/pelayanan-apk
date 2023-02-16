<?php

namespace App\Http\Controllers;

use App\Http\Requests\KebutuhanRequest;
use App\Models\Kebutuhan;
use Illuminate\Http\Request;

class KebutuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kebutuhans = Kebutuhan::orderBy('created_at')->get();
        $total_harga = collect($kebutuhans)->sum('harga');
        return view('kebutuhan.index', [
            'kebutuhans' => $kebutuhans,
            'total_harga' => $total_harga
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kebutuhan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KebutuhanRequest $request)
    {
        Kebutuhan::create([
            'barang' => $request->barang,
            'harga' => $request->harga
        ]);
        $pesan = "Kebutuhan telah ditambah";
        return redirect()->route('kebutuhan.index')->with('pesan', $pesan);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kebutuhan  $kebutuhan
     * @return \Illuminate\Http\Response
     */
    public function show(Kebutuhan $kebutuhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kebutuhan  $kebutuhan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kebutuhan $kebutuhan)
    {
        return view('kebutuhan.edit', [
            'kebutuhan' => $kebutuhan,
        ]);
    }   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kebutuhan  $kebutuhan
     * @return \Illuminate\Http\Response
     */
    public function update(KebutuhanRequest $request, Kebutuhan $kebutuhan)
    {
       $kebutuhan->update([
            'barang' => $request->barang,
            'harga' => $request->harga
        ]);
        $pesan = "Data Kebutuhan telah diubah";
        return redirect()->route('kebutuhan.index')->with('pesan', $pesan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kebutuhan  $kebutuhan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kebutuhan $kebutuhan)
    {
        $kebutuhan->delete();
        $pesan = "Data $kebutuhan->barang telah dihapus";
        return redirect()->route('kebutuhan.index')->with('pesan', $pesan);
    }
}
