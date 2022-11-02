<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\bahan_baku;

class bahan_bakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bahan_baku::create([
            'kode' => 'B01',
            'bahan' => 'Kain',
            'stok' => 0,
        ]);
        bahan_baku::create([
            'kode' => 'B02',
            'bahan' => 'Benang',
            'stok' => 0,
        ]);
        
    }
}
