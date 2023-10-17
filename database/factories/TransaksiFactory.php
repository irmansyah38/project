<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaksi>
 */
class TransaksiFactory extends Factory
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
            'order_id' => fake()->unique()->numberBetween(0, 100) . "-" . date('Y-m-d-H:i:s'),
            'user_id' => fake()->numberBetween(0, 100),
            'total_price' => $harga,
            'qty' => $jumlah_orang,
            "name" => fake()->name(),
            "status" => 'paid',
            'phone' => '08989540299',
            'hari' => fake()->numberBetween(1, 30),
            'bulan' => fake()->numberBetween(1, 12),
            'tahun' => fake()->numberBetween(2020, 2023),
        ];
    }
}
