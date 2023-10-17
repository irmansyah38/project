<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DaftarTransaksi>
 */
class DaftarTransaksiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $harga = 1500;
        $jumlah_orang = fake()->numberBetween(1, 100);
        $harga *= $jumlah_orang;
        return [
            'user_id' => fake()->numberBetween(0, 150),
            'harga' => $harga,
            'jumlah_orang' => $jumlah_orang,
            "status" => 1,
            'hari' => fake()->numberBetween(1, 30),
            'bulan' => fake()->numberBetween(1, 12),
            'tahun' => fake()->numberBetween(2020, 2023),
            'created_at' => fake()->dateTime()
        ];
    }
}
