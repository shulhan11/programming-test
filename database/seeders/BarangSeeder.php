<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Barang::create([
            'kode' => 'B001',
            'nama' => 'Barang1',
            'harga' => '10000.00',
        ]);
        Barang::create([
            'kode' => 'B002',
            'nama' => 'Barang2',
            'harga' => '20000.00',
        ]);
        Barang::create([
            'kode' => 'B003',
            'nama' => 'Barang3',
            'harga' => '30000.00',
        ]);
        Barang::create([
            'kode' => 'B004',
            'nama' => 'Barang4',
            'harga' => '40000.00',
        ]);
    }
}
