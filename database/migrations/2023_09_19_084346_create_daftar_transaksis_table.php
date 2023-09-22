<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('daftar_transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->integer("jumlah_orang");
            $table->integer("harga");
            $table->boolean("status");
            $table->integer('hari');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_transaksis');
    }
};
