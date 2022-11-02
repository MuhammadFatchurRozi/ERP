<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\pesanan;

class pesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'L',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'M',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'S',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'XL',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'XXL',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'XXXL',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'XXXXL',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'XXXXXL',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
        pesanan::create([
            'produk' => 'kaos',
            'ukuran' => 'XXXXXXL',
            'jml_kaos' => 10,
            'kain' => 100000,
            'benang' => 10000,
        ]);
    }
}
