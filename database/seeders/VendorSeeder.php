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
            'nama_vendor' => 'PT.A',
            'alamat' => 'Jl. A',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.A-Benang-001',
            'nama_bahan_baku' => 'Benang',
            'status' => 'aktif',
            'harga' => '20000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.B',
            'alamat' => 'Jl. B',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.B-Benang-002',
            'nama_bahan_baku' => 'Benang',
            'status' => 'aktif',
            'harga' => '20000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.C',
            'alamat' => 'Jl. C',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.C-Benang-003',
            'nama_bahan_baku' => 'Benang',
            'status' => 'nonaktif',
            'harga' => '20000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.D',
            'alamat' => 'Jl. D',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.D-Benang-004',
            'nama_bahan_baku' => 'Benang',
            'status' => 'nonaktif',
            'harga' => '20000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.E',
            'alamat' => 'Jl. E',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.E-Kain-005',
            'nama_bahan_baku' => 'Kain',
            'status' => 'aktif',
            'harga' => '50000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.F',
            'alamat' => 'Jl. F',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.F-Kain-006',
            'nama_bahan_baku' => 'Kain',
            'status' => 'aktif',
            'harga' => '50000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.G',
            'alamat' => 'Jl. G',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.G-Kain-007',
            'nama_bahan_baku' => 'Kain',
            'status' => 'nonaktif',
            'harga' => '50000',
            'count_confirm_order' => 0,
        ]);
        vendor::create([
            'nama_vendor' => 'PT.H',
            'alamat' => 'Jl. H',
            'no_telp' => '08123456789',
            'kode_vendor' => 'PT.H-Kain-008',
            'nama_bahan_baku' => 'Kain',
            'status' => 'nonaktif',
            'harga' => '50000',
            'count_confirm_order' => 0,
        ]);
    }
}
