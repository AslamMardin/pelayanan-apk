<?php

namespace App\Exports;

use App\Models\Jemput;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class JemputsExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    public function collection()
    {
        return Jemput::all();
    }

    public function headings(): array
    {
        return [
           [
            'tanggal',
            'nama',
            'alamat',
            'barang',
            'transportasi',
           ],
        ];
    }

    public function map($jemput): array
    {
        return [
          $jemput->created_at->format('d-m-Y'),
          $jemput->pelanggan->nama,
          $jemput->alamat,
          $jemput->barang,
          $jemput->transportasi
        ];
    }
    
}
