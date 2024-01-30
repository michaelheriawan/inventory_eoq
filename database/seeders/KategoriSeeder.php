<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            'nama' => 'Kulkas - 1 Pintu',
        ]);
        DB::table('kategori')->insert([
            'nama' => 'Kulkas - 2 Pintu',
        ]);
        DB::table('kategori')->insert([
            'nama' => 'Showcase',
        ]);
        DB::table('kategori')->insert([
            'nama' => 'Dispenser',
        ]);
        DB::table('kategori')->insert([
            'nama' => 'Rice Cooker',
        ]);
        DB::table('kategori')->insert([
            'nama' => 'Speaker Multimedia',
        ]);
        DB::table('kategori')->insert([
            'nama' => 'Mesin Suci',
        ]);

    }
}
