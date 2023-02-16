<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PelanggansImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama' => $row['nama'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nomor' => $row['nomor'],
            'alamat' => $row['alamat'],
        ]);
    }
}
