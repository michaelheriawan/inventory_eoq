<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
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
            'email' => fake()->email(),
            'No_Tlp' => fake()->e164PhoneNumber(),
            'alamat' => fake()->streetAddress(),
            'nama_usaha' => fake()->company(),
        ];

    }
}
