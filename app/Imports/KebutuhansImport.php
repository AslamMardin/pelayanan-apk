<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Kebutuhan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KebutuhansImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Kebutuhan([
            'created_at' => strtotime($row['tanggal']),
            'barang' => $row['barang'],
            'harga' => $row['harga']
        ]);
    }
}
