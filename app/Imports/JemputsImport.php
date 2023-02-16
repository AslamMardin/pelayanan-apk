<?php

namespace App\Imports;

use App\Models\Jemput;
use App\Models\Pelanggan;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JemputsImport implements ToCollection, WithHeadingRow
{
  
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $pelanggan = Pelanggan::where('nama', $row['nama'])->first();
            if ($pelanggan != null) {
                Jemput::create([
                    'created_at' => $row['tanggal'],
                    'pelanggan_id' => $pelanggan->id,
                    'alamat' => $row['alamat'],
                    'barang' => $row['barang'],
                    'transportasi' => $row['transportasi'],
                ]);
            }
        }
    }
   
}
