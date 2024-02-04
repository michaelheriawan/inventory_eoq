<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangMasuk>
 */
class BarangMasukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 5),
            'barang_id' => fake()->numberBetween(1, 8),
            'supplier_id' => fake()->numberBetween(1, 20),
            'jumlah_masuk' => fake()->randomNumber(2, true),
        ];

    }
}
