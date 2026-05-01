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
        Schema::create('tagihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penggunaan_id');
            $table->foreignId('pelanggan_id')->constrained('pelanggan')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('bulan');
            $table->integer('tahun');
            $table->integer('jumlah_meter');
            $table->integer('jumlah_biaya');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tagihan');
    }
};
