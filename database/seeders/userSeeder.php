<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'role' => 1,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'),
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'user',
            'role' => 2,
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('user'),
            'remember_token' => Str::random(10),
        ]);
    }
}
