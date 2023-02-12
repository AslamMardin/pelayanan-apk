<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelangganRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Pelanggan;
use Illuminate\Validation\Rule;
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
    public function store(PelangganRequest $request)
    {
        $request->validate([
            'nama' => Rule::unique('pelanggans')
        ], [
            'unique' => ':attribute palanggan sudah ada! masukan nama lain.'
        ]);
        Pelanggan::create([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        $pesan = "Data ". $request->nama . "pelangga telah ditambah";
        $request->session()->flush('pesan', $pesan);
        return redirect()->route('workit.pelanggan');
       
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
        $pelanggan = Pelanggan::find($id);
    
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PelangganRequest $request, $id)
    {
        $request->validate([
            'nama' => Rule::unique('pelanggans')->ignore($id)
        ]);
        Pelanggan::find($id)->update([
            'nama' => $request->nama,
            'nomor' => $request->nomor,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        return redirect()->route('workit.pelanggan')->with('pesan', "Data Pelanggan Berhasil Diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan =  Pelanggan::find($id);
        $pelanggan->delete();
        return redirect()->route('workit.pelanggan')->with('pesan', "Data Pelanggan $pelanggan->nama Berhasil dihapus");
    }

    public function sampah()
    {
        $pelanggan = Pelanggan::onlyTrashed()->get();
        return view('pelanggan.sampah', [
            'pelanggans' => $pelanggan
        ]);
    }

    public function hapus($id)
    {
        $pelanggan = Pelanggan::withTrashed()->findOrFail($id);
        $pelanggan->forceDelete();
        return redirect()->route('workit.pelanggan')->with('pesan', "Data Pelanggan $pelanggan->nama Berhasil dihapus permanent");
    }

    public function restore($id)
    {
        $pelanggan = Pelanggan::withTrashed()->findOrFail($id);
        $pelanggan->restore();
        return redirect()->route('workit.pelanggan')->with('pesan', "Data Pelanggan $pelanggan->nama Berhasil di restore");
    }
}
