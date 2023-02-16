<?php

namespace App\Exports;

use App\Models\Kebutuhan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class KebutuhansExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    public function collection()
    {
        return Kebutuhan::all();
    }

    public function headings(): array
    {
        return [
           [
            'tanggal',
            'barang',
            'harga',
           ],
        ];
    }

    public function map($jemput): array
    {
        return [
          $jemput->created_at->format('d-m-Y'),
          $jemput->barang,
          $jemput->harga
        ];
    }
}
