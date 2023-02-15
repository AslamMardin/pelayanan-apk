<?php

namespace App\Exports;

use App\Models\NotaDetail;
use App\Models\Pengaturan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemasukanExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;
    public $bulan;
    
  

    public function forJenis($bulan)
    {
        $this->bulan = $bulan;
        
        return $this;
    }

    public function query()
    {
       
        return NotaDetail::query()->whereMonth('created_at', $this->bulan);
    }

    public function headings(): array
    {
        $nama_bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        return [
            ["Tabel Pemasukan di bulan ". $nama_bulan[$this->bulan - 1]],
            [
            'Tanggal',
            'Nama Baramg',
            'Keterangan',
            'Rupiah',
            ]
        ];  
    }
    public function map($noDetail): array
    {
            return [
                $noDetail->created_at->format('d-m-Y'),
                $noDetail->nota->nama_barang,
                $noDetail->nota->keterangan,
                ($noDetail->pemasukan) ? $noDetail->pemasukan : 0
            ];
    }
}
