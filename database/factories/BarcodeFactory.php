<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barcode>
 */
class BarcodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->ean13(),
            'user_id' => fake()->numberBetween(1, 150),
            'jumlah_orang' => fake()->numberBetween(1, 30),
            'status' => 'paid',
            'order_id' => fake()->unique()->numberBetween(0, 100) . "-" . date('Y-m-d-H:i:s')
        ];
    }
}
