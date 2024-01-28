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
        DB::table('kategoris')->insert([
            'nama' => 'Kulkas - 1 Pintu',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Kulkas - 2 Pintu',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Showcase',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Dispenser',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Rice Cooker',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Speaker Multimedia',
        ]);
        DB::table('kategoris')->insert([
            'nama' => 'Mesin Suci',
        ]);

    }
}
