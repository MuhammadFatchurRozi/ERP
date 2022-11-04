<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\vendor;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        vendor::create([
            'nama_vendor' => 'PT. A',
            'alamat' => 'Jl. A',
            'no_telp' => '08123456789',
            'kode_produk' => 'A',
            'nama_produk' => 'Benang',
            'status' => 'aktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. B',
            'alamat' => 'Jl. B',
            'no_telp' => '08123456789',
            'kode_produk' => 'B',
            'nama_produk' => 'Benang',
            'status' => 'aktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. C',
            'alamat' => 'Jl. C',
            'no_telp' => '08123456789',
            'kode_produk' => 'C',
            'nama_produk' => 'Benang',
            'status' => 'nonaktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. D',
            'alamat' => 'Jl. D',
            'no_telp' => '08123456789',
            'kode_produk' => 'D',
            'nama_produk' => 'Benang',
            'status' => 'nonaktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. E',
            'alamat' => 'Jl. E',
            'no_telp' => '08123456789',
            'kode_produk' => 'E',
            'nama_produk' => 'Kain',
            'status' => 'aktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. F',
            'alamat' => 'Jl. F',
            'no_telp' => '08123456789',
            'kode_produk' => 'F',
            'nama_produk' => 'Kain',
            'status' => 'aktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. G',
            'alamat' => 'Jl. G',
            'no_telp' => '08123456789',
            'kode_produk' => 'G',
            'nama_produk' => 'Kain',
            'status' => 'nonaktif',
        ]);
        vendor::create([
            'nama_vendor' => 'PT. H',
            'alamat' => 'Jl. H',
            'no_telp' => '08123456789',
            'kode_produk' => 'H',
            'nama_produk' => 'Kain',
            'status' => 'nonaktif',
        ]);
    }
}
