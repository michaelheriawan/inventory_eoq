<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KategoriSeeder::class,
            UserSeeder::class,
            SupplierSeeder::class,
            SpreadsheetSeeder::class,
        ]);

        \App\Models\User::factory()->create([
            'nama' => 'Test User',
            'email' => 'admin@example.com',
            'level' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'nama' => 'Test User2',
            'email' => 'pemilik@example.com',
            'level' => 'pemilik',
        ]);
    }
}
