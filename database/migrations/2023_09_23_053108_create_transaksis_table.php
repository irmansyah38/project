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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string("order_id");
            $table->foreignId('user_id');
            $table->string('name');
            $table->integer('hari');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->string('phone');
            $table->integer('qty');
            $table->bigInteger('total_price');
            $table->enum('status', ['unpaid', 'paid']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
