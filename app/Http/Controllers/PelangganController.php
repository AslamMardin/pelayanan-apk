<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelanggan;
class PelangganController extends Controller
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
        $jk = ['laki-laki', 'perempuan'];
        return view('pelanggan.create', [
            'jk' => $jk
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'min:3', 'unique:pelanggans'],
            'nomor' => ['required'],
            'alamat' => ['required'],
            'jk' => ['required', 'in:laki-laki,perempuan']
        ], [
            'required' => 'Input :attribute Harus Ada',
            'min' => [
                "string" => ':attribute Minimal :min Karakter'
            ],
            'in' => 'Anda Belum memilih jenis kelamin'
        ]);
 
        if ($validator->fails()) {
            return redirect()
            ->route('pelanggan.create')
            ->withErrors($validator)
            ->withInput();
        }

        Pelanggan::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jk,
        ]);

        return redirect()->route('workit.pelanggan')->with('pesan', 'Data Pelanggan Berhasil Ditambahkan');
       
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
