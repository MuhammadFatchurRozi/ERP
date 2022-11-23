<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\bom;
use Carbon\Carbon;

class BoMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        bom::Create([
            'id' => 1,
            'kode' => 'P01',
            'nama' => 'Lengan Panjang',
            'ukuran' => 'M',
            'kain' => 0.25,
            'benang' => 125,
            'quantity' => 1,
            'estimasi' => 16,
            'harga' => 75000,
        ]);
        bom::Create([
            'id' => 2,
            'kode' => 'P02',
            'nama' => 'Lengan Panjang',
            'ukuran' => 'L',
            'kain' => 0.25,
            'benang' => 125,
            'quantity' => 1,
            'estimasi' => 16,
            'harga' => 75000,
        ]);
        bom::Create([
            'id' => 3,
            'kode' => 'P03',
            'nama' => 'Lengan Panjang',
            'ukuran' => 'XL',
            'kain' => 0.25,
            'benang' => 125,
            'quantity' => 1,
            'estimasi' => 16,
            'harga' => 75000,
        ]);
        bom::Create([
            'id' => 4,
            'kode' => 'P04',
            'nama' => 'Lengan Pendek',
            'ukuran' => 'M',
            'kain' => 0.25,
            'benang' => 125,
            'quantity' => 1,
            'estimasi' => 15,
            'harga' => 70000,
        ]);
        bom::Create([
            'id' => 5,
            'kode' => 'P05',
            'nama' => 'Lengan Pendek',
            'ukuran' => 'L',
            'kain' => 0.25,
            'benang' => 125,
            'quantity' => 1,
            'estimasi' => 15,
            'harga' => 70000,
        ]);
        bom::Create([
            'id' => 6,
            'kode' => 'P06',
            'nama' => 'Lengan Pendek',
            'ukuran' => 'XL',
            'kain' => 0.25,
            'benang' => 125,
            'quantity' => 1,
            'estimasi' => 15,
            'harga' => 70000,
        ]);
    }
}
