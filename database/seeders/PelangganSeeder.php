<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Pelanggan::create([
            'nama' => 'aslam mardin',
            'nomor' => '085825587404',
            'alamat' => 'bonde campalagian',
            'jenis_kelamin' => 'L'
        ]);
    }
}
