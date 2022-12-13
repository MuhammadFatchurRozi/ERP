<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\costumer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        costumer::factory()->count(10)->create();
        $this->call([
            bahan_bakuSeeder::class,
            userSeeder::class,
            ProductSeeder::class,
            BoMSeeder::class,
            VendorSeeder::class,
        ]);

    }
}
