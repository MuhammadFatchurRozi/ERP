<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        product::create([
            'kode' => 'P01',
            'nama' => 'Lengan Panjang',
            'ukuran' => 'M',
            'harga' => 10000,
            'penjualan' => 0,
        ]);
        product::create([
            'kode' => 'P02',
            'nama' => 'Lengan Panjang',
            'ukuran' => 'L',
            'harga' => 20000,
            'penjualan' => 0,
        ]);
        product::create([
            'kode' => 'P03',
            'nama' => 'Lengan Panjang',
            'ukuran' => 'XL',
            'harga' => 30000,
            'penjualan' => 0,
        ]);
        product::create([
            'kode' => 'P04',
            'nama' => 'Lengan Pendek',
            'ukuran' => 'M',
            'harga' => 10000,
            'penjualan' => 0,
        ]);
        product::create([
            'kode' => 'P05',
            'nama' => 'Lengan Pendek',
            'ukuran' => 'L',
            'harga' => 20000,
            'penjualan' => 0,
        ]);
        product::create([
            'kode' => 'P06',
            'nama' => 'Lengan Pendek',
            'ukuran' => 'XL',
            'harga' => 30000,
            'penjualan' => 0,
        ]);
    }
}
