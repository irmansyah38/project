<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();
        \App\Models\Barcode::factory(300)->create();
        \App\Models\Paragraf::factory(2)->create();
        \App\Models\FAQ::factory(6)->create();
        \App\Models\Harga::factory(1)->create();
        \App\Models\Transaksi::factory(100)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
