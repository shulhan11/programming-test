<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'kode' => 'C001',
            'name' => 'Cus1',
            'telphone' => '09090909'
        ]);
        Customer::create([
            'kode' => 'C002',
            'name' => 'Cus2',
            'telphone' => '09090909'
        ]);
        Customer::create([
            'kode' => 'C003',
            'name' => 'Cus3',
            'telphone' => '09090909'
        ]);
        Customer::create([
            'kode' => 'C004',
            'name' => 'Cus4',
            'telphone' => '09090909'
        ]);
    }
}
