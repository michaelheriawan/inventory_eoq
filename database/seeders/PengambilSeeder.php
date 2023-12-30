<?php

namespace Database\Seeders;

use App\Models\Pengambil;
use Illuminate\Database\Seeder;

class PengambilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengambil::factory(20)->create();

    }
}
