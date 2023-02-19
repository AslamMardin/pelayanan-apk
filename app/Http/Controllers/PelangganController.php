<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\PelanggansExport;
use App\Imports\PelanggansImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\PelangganRequest;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelangganTrashed = Pelanggan::onlyTrashed()->orderBy('nama', 'asc')->get();
        $pelanggans = Pelanggan::withCount('nota')->get();

        return view('workit.pelanggan', [
            'pelangganTrashed' =>count($pelangganTrashed),
            'pelanggans' =>$pelanggans,
        ]);
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
        return redirect('/workit/pelanggan')->with('pesan', $pesan);
       
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::with('nota')->whereHas('nota', function($q) use($id){
            $q->where('pelanggan_id', $id);
        })->first();
        return view('pelanggan.show', [
            'pelanggan' => $pelanggan
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
        return redirect()->route('workit.pelanggan')->with('pesan', "Data Pelanggan $pelanggan->nama masuk tempat sampah");
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
        return redirect()->route('workit.pelanggan')->with('pesan', "Data Pelanggan $pelanggan->nama Berhasil di kembalikan");
    }

    public function export()
    {
        // return Pelanggan::download(new PelanggansExport, 'pelanggan-'.Carbon::now()->timestamp.'.xlsx');
        return (new PelanggansExport)->download('pelanggan-'.Carbon::now()->format('d-m-Y').'.xlsx');
    }

    public function import()
    {
    
        return view('pelanggan.import');
    }

    public function ProsesImport(Request $request)
    {
        Excel::import(new PelanggansImport, $request->file('file'));
        
        return redirect('/workit/pelanggan')->with('pesan', 'All good!');
    }
}
