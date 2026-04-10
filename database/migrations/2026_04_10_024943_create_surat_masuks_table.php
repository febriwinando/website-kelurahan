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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('terima_surat')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('dari')->nullable();
            $table->string('perihal')->nullable();
            $table->string('diteruskan_kepada')->nullable();
            $table->json('lampiran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
