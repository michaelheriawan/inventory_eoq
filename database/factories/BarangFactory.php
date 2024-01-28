<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => fake()->firstNameMale(),
            'kategori' => fake()->numberBetween(1, 7),
            'stok' => fake()->randomNumber(2, true),
            'gambar' => "test",
        ];
    }
}
