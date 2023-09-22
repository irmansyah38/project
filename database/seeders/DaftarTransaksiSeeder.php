<?php

namespace Database\Seeders;

use App\Models\DaftarTransaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DaftarTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DaftarTransaksi::factory()->count(100);
    }
}
