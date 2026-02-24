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
        Schema::create('anggota_tim_penggerak_p_k_k_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
    
            // $table->foreignId('jabatan_id')
            //     ->constrained('jabatans')
            //     ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_tim_penggerak_p_k_k_s');
    }
};
