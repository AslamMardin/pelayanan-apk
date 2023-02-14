<?php

namespace App\Exports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PelanggansExport implements FromCollection, WithMapping, WithHeadings
{
    use Exportable;
    public function collection()
    {
        return Pelanggan::all();
    }
   
    public function map($pelanggan): array
    {
        return [
            $pelanggan->id,
            $pelanggan->nama,
            $pelanggan->jenis_kelamin,
            $pelanggan->nomor,
            $pelanggan->alamat,
            
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'Jenis Kelamin',
            'Nomor',
            'Alamat',
        ];
    }
}
