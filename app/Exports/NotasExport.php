<?php

namespace App\Exports;

use App\Models\Nota;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class NotasExport implements WithMapping, WithHeadings, FromQuery
{
    use Exportable;
    public $status;

    public function status($status)
    {
        $this->status = $status;
        return $this;
    }
  

    public function query()
    {
        return Nota::query()->where('status', $this->status);
    }

    public function map($nota): array
    {
        $label  = ($nota->notaDetail->label_garansi == null) ? 0 : $nota->notaDetail->label_garansi;
        $pengeluaran  = ($nota->notaDetail->pengeluaran == null) ? 0 : $nota->notaDetail->pengeluaran;
        $pemasukan  = ($nota->notaDetail->pemasukan == null) ? 0 : $nota->notaDetail->pemasukan;
        return [
            $nota->nama_barang,
            $nota->pelanggan->nama,
            $nota->keterangan,
            $nota->created_at->format('d/M/Y'),
            $label . " Bulan",
            $pengeluaran,
            $pemasukan,
            $nota->status
          
        ];
    }

    public function headings(): array
    {
        return [
           [
            'Nama Barang',
            'Nama Pelanggan',
            'Keluhan',
            'Tanggal Masuk',
            'Garansi',
            'Pengeluaran',
            'Total Bayar(Pemasukan)',
            'Status Bayar'
           ],
        ];
    }
}

